<?php
if (!isset($_GET['id'])) {
    header("Location: " . ROOT . "admin/?page=barber");
    exit;
}

$id = intval($_GET['id']);
$barber = barber_list_one($id);

if (!$barber) {
    echo "<div class='container-fluid'><h3>Không tìm thấy thợ chụp ảnh!</h3></div>";
    return;
}

$profile = [];
if (!empty($barber['profile_data'])) {
    $profile = json_decode($barber['profile_data'], true);
}

// Fallback template matching all 8 items
if (empty($profile)) {
    $profile = [
        'stage_name' => '',
        'birthday' => '',
        'website' => '',
        'socials' => ['facebook' => '', 'instagram' => '', 'behance' => '', 'twitter' => ''],
        'bio' => ['story' => '', 'style' => '', 'philosophy' => '', 'difference' => ''],
        'services' => [
            ['title' => '', 'description' => '', 'packages' => [['name' => '', 'price' => '', 'features' => ''], ['name' => '', 'price' => '', 'features' => '']]],
            ['title' => '', 'description' => '', 'packages' => [['name' => '', 'price' => '', 'features' => ''], ['name' => '', 'price' => '', 'features' => '']]]
        ],
        'workflow' => [
            ['step' => '1. Tư vấn & Lên Concept', 'detail' => ''],
            ['step' => '2. Thực hiện Buổi chụp', 'detail' => ''],
            ['step' => '3. Hậu kỳ & Bàn giao', 'detail' => '']
        ],
        'experience' => ['years' => '', 'projects' => [], 'awards' => [], 'clients' => [], 'media' => []],
        'skills' => [],
        'software' => [],
        'equipment' => ['cameras' => [], 'lenses' => [], 'lighting' => []],
        'education' => [
            ['degree' => '', 'school' => '', 'year' => ''],
            ['degree' => '', 'school' => '', 'year' => '']
        ],
        'certifications' => [],
        'testimonials' => [
            ['client_name' => '', 'avatar' => '', 'comment' => '', 'rating' => 5],
            ['client_name' => '', 'avatar' => '', 'comment' => '', 'rating' => 5]
        ],
        'portfolio_categories' => [
            ['name' => 'Chân dung (Portrait)', 'images' => []],
            ['name' => 'Cưới & Đôi (Wedding)', 'images' => []]
        ],
        'before_after' => [
            ['title' => '', 'before' => '', 'after' => ''],
            ['title' => '', 'before' => '', 'after' => '']
        ],
        'case_studies' => [
            ['title' => '', 'challenge' => '', 'solution' => '', 'result' => ''],
            ['title' => '', 'challenge' => '', 'solution' => '', 'result' => '']
        ]
    ];
}

// Ensure nested structures are set to prevent notices
if (!isset($profile['socials'])) $profile['socials'] = ['facebook' => '', 'instagram' => '', 'behance' => '', 'twitter' => ''];
if (!isset($profile['bio'])) $profile['bio'] = ['story' => '', 'style' => '', 'philosophy' => '', 'difference' => ''];
if (!isset($profile['services'])) $profile['services'] = [];
if (!isset($profile['workflow'])) $profile['workflow'] = [['step' => '1. Tư vấn & Lên Concept', 'detail' => ''], ['step' => '2. Thực hiện Buổi chụp', 'detail' => ''], ['step' => '3. Hậu kỳ & Bàn giao', 'detail' => '']];
if (!isset($profile['experience'])) $profile['experience'] = ['years' => '', 'projects' => [], 'awards' => [], 'clients' => [], 'media' => []];
if (!isset($profile['skills'])) $profile['skills'] = [];
if (!isset($profile['software'])) $profile['software'] = [];
if (!isset($profile['equipment'])) $profile['equipment'] = ['cameras' => [], 'lenses' => [], 'lighting' => []];
if (!isset($profile['education'])) $profile['education'] = [['degree' => '', 'school' => '', 'year' => '']];
if (!isset($profile['certifications'])) $profile['certifications'] = [];
if (!isset($profile['testimonials'])) $profile['testimonials'] = [['client_name' => '', 'avatar' => '', 'comment' => '', 'rating' => 5]];
if (!isset($profile['portfolio_categories'])) $profile['portfolio_categories'] = [['name' => 'Chân dung', 'images' => []]];
if (!isset($profile['before_after'])) $profile['before_after'] = [['title' => '', 'before' => '', 'after' => '']];
if (!isset($profile['case_studies'])) $profile['case_studies'] = [['title' => '', 'challenge' => '', 'solution' => '', 'result' => '']];

if (isset($_POST['btnupdate'])) {
    // Stage Name & Basics
    $stage_name = $_POST['stage_name'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $website = $_POST['website'] ?? '';
    
    $socials = [
        'facebook' => $_POST['social_fb'] ?? '',
        'instagram' => $_POST['social_ig'] ?? '',
        'behance' => $_POST['social_bh'] ?? '',
        'twitter' => $_POST['social_tw'] ?? ''
    ];
    
    // Bio
    $bio = [
        'story' => $_POST['bio_story'] ?? '',
        'style' => $_POST['bio_style'] ?? '',
        'philosophy' => $_POST['bio_philosophy'] ?? '',
        'difference' => $_POST['bio_difference'] ?? ''
    ];
    
    // Workflow
    $workflow = [];
    for ($i = 0; $i < 3; $i++) {
        if (!empty($_POST["wf_step_$i"])) {
            $workflow[] = [
                'step' => $_POST["wf_step_$i"],
                'detail' => $_POST["wf_detail_$i"] ?? ''
            ];
        }
    }
    
    // Services & packages
    $services = [];
    for ($i = 0; $i < 2; $i++) {
        if (!empty($_POST["service_title_$i"])) {
            $pkgs = [];
            for ($j = 0; $j < 2; $j++) {
                if (!empty($_POST["service_{$i}_pkg_name_{$j}"])) {
                    $pkgs[] = [
                        'name' => $_POST["service_{$i}_pkg_name_{$j}"],
                        'price' => $_POST["service_{$i}_pkg_price_{$j}"] ?? '',
                        'features' => $_POST["service_{$i}_pkg_feat_{$j}"] ?? ''
                    ];
                }
            }
            $services[] = [
                'title' => $_POST["service_title_$i"],
                'description' => $_POST["service_desc_$i"] ?? '',
                'packages' => $pkgs
            ];
        }
    }
    
    // Experience & Accomplishments
    $projects = array_filter(array_map('trim', explode("\n", $_POST['exp_projects'] ?? '')));
    $awards = array_filter(array_map('trim', explode("\n", $_POST['exp_awards'] ?? '')));
    $clients = array_filter(array_map('trim', explode(",", $_POST['exp_clients'] ?? '')));
    $media = array_filter(array_map('trim', explode("\n", $_POST['exp_media'] ?? '')));
    $certifications = array_filter(array_map('trim', explode("\n", $_POST['certifications'] ?? '')));
    
    $experience = [
        'years' => $_POST['exp_years'] ?? '',
        'projects' => array_values($projects),
        'awards' => array_values($awards),
        'clients' => array_values($clients),
        'media' => array_values($media)
    ];
    
    // Skills & Gear
    $skills = array_filter(array_map('trim', explode(",", $_POST['skills_list'] ?? '')));
    $software = array_filter(array_map('trim', explode(",", $_POST['software_list'] ?? '')));
    
    $cameras = array_filter(array_map('trim', explode(",", $_POST['gear_cameras'] ?? '')));
    $lenses = array_filter(array_map('trim', explode(",", $_POST['gear_lenses'] ?? '')));
    $lighting = array_filter(array_map('trim', explode(",", $_POST['gear_lighting'] ?? '')));
    
    $equipment = [
        'cameras' => array_values($cameras),
        'lenses' => array_values($lenses),
        'lighting' => array_values($lighting)
    ];
    
    // Education
    $education = [];
    for ($i = 0; $i < 3; $i++) {
        if (!empty($_POST["edu_degree_$i"])) {
            $education[] = [
                'degree' => $_POST["edu_degree_$i"],
                'school' => $_POST["edu_school_$i"] ?? '',
                'year' => $_POST["edu_year_$i"] ?? ''
            ];
        }
    }
    
    // Categorized Portfolio with image listings
    $portfolio_categories = [];
    for ($i = 0; $i < 2; $i++) {
        $cat_name = $_POST["portfolio_cat_name_$i"] ?? '';
        $cat_imgs = array_filter(array_map('trim', explode(",", $_POST["portfolio_cat_imgs_$i"] ?? '')));
        
        // Handle uploading new images specifically to this category
        if (!empty($_FILES["portfolio_cat_uploads_$i"]['name'][0])) {
            foreach ($_FILES["portfolio_cat_uploads_$i"]['name'] as $key => $val) {
                if ($_FILES["portfolio_cat_uploads_$i"]['size'][$key] > 0) {
                    $ext = pathinfo($val, PATHINFO_EXTENSION);
                    if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif'])) {
                        $new_filename = uniqid() . "_cat{$i}_" . basename($val);
                        if (move_uploaded_file($_FILES["portfolio_cat_uploads_$i"]['tmp_name'][$key], '../images/users/' . $new_filename)) {
                            $cat_imgs[] = $new_filename;
                        }
                    }
                }
            }
        }
        
        if (!empty($cat_name)) {
            $portfolio_categories[] = [
                'name' => $cat_name,
                'images' => array_values($cat_imgs)
            ];
        }
    }
    
    // Before & After Comparisons
    $before_after = [];
    for ($i = 0; $i < 2; $i++) {
        $ba_title = $_POST["ba_title_$i"] ?? '';
        $before_img = $_POST["existing_ba_before_$i"] ?? '';
        $after_img = $_POST["existing_ba_after_$i"] ?? '';
        
        // Upload Before file
        if (!empty($_FILES["ba_before_upload_$i"]['name'])) {
            $ext = pathinfo($_FILES["ba_before_upload_$i"]['name'], PATHINFO_EXTENSION);
            if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif'])) {
                $new_name = uniqid() . "_b_{$i}_" . basename($_FILES["ba_before_upload_$i"]['name']);
                if (move_uploaded_file($_FILES["ba_before_upload_$i"]['tmp_name'], '../images/users/' . $new_name)) {
                    $before_img = $new_name;
                }
            }
        }
        
        // Upload After file
        if (!empty($_FILES["ba_after_upload_$i"]['name'])) {
            $ext = pathinfo($_FILES["ba_after_upload_$i"]['name'], PATHINFO_EXTENSION);
            if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif'])) {
                $new_name = uniqid() . "_a_{$i}_" . basename($_FILES["ba_after_upload_$i"]['name']);
                if (move_uploaded_file($_FILES["ba_after_upload_$i"]['tmp_name'], '../images/users/' . $new_name)) {
                    $after_img = $new_name;
                }
            }
        }
        
        if (!empty($ba_title)) {
            $before_after[] = [
                'title' => $ba_title,
                'before' => $before_img ? $before_img : 't3.jpg',
                'after' => $after_img ? $after_img : 't4.jpg'
            ];
        }
    }
    
    // Testimonials
    $testimonials = [];
    for ($i = 0; $i < 2; $i++) {
        $client_name = $_POST["test_name_$i"] ?? '';
        $comment = $_POST["test_comment_$i"] ?? '';
        $rating = intval($_POST["test_rating_$i"] ?? 5);
        $avatar = $_POST["existing_test_avatar_$i"] ?? '';
        
        if (!empty($_FILES["test_avatar_$i"]["name"])) {
            $ext = pathinfo($_FILES["test_avatar_$i"]["name"], PATHINFO_EXTENSION);
            if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif'])) {
                $new_avatar = uniqid() . "_t_{$i}_" . basename($_FILES["test_avatar_$i"]["name"]);
                if (move_uploaded_file($_FILES["test_avatar_$i"]["tmp_name"], '../images/users/' . $new_avatar)) {
                    $avatar = $new_avatar;
                }
            }
        }
        
        if (!empty($client_name)) {
            $testimonials[] = [
                'client_name' => $client_name,
                'avatar' => $avatar ? $avatar : 't1.jpg',
                'comment' => $comment,
                'rating' => $rating
            ];
        }
    }
    
    // Case Studies
    $case_studies = [];
    for ($i = 0; $i < 2; $i++) {
        $cs_title = $_POST["cs_title_$i"] ?? '';
        $challenge = $_POST["cs_challenge_$i"] ?? '';
        $solution = $_POST["cs_solution_$i"] ?? '';
        $result = $_POST["cs_result_$i"] ?? '';
        
        if (!empty($cs_title)) {
            $case_studies[] = [
                'title' => $cs_title,
                'challenge' => $challenge,
                'solution' => $solution,
                'result' => $result
            ];
        }
    }
    
    // Construct final JSON data
    $updated_profile = [
        'stage_name' => $stage_name,
        'birthday' => $birthday,
        'website' => $website,
        'socials' => $socials,
        'bio' => $bio,
        'services' => $services,
        'workflow' => $workflow,
        'experience' => $experience,
        'skills' => array_values($skills),
        'software' => array_values($software),
        'equipment' => $equipment,
        'education' => $education,
        'certifications' => array_values($certifications),
        'testimonials' => $testimonials,
        'portfolio_categories' => $portfolio_categories,
        'before_after' => $before_after,
        'case_studies' => $case_studies
    ];
    
    barber_update_profile($id, json_encode($updated_profile, JSON_UNESCAPED_UNICODE));
    $_SESSION['message'] = "Cập nhật Profile thành công!";
    header("Location: " . ROOT . "admin/?page=barber&action=edit_profile&id=" . $id);
    exit;
}
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản trị Profile: <?= htmlspecialchars($barber['name']) ?></h1>
        <a href="<?= ROOT ?>admin/?page=barber" class="btn btn-secondary btn-sm shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Quay lại danh sách</a>
    </div>

    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-success alert-bold">
            <h6 class="font-weight-bold alert-text"><?= $_SESSION['message'] ?></h6>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cấu hình Đầy đủ 8 Mục Checklist của Photographer Profile</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                
                <!-- Bootstrap Tabs Header -->
                <ul class="nav nav-tabs mb-4" id="profileTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab">1. Cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bio-tab" data-toggle="tab" href="#bio" role="tab">2. Bio & Quy trình</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab">3. Dịch vụ & Gói</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="resume-tab" data-toggle="tab" href="#resume" role="tab">4. Kinh nghiệm & Học vấn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="skills-tab" data-toggle="tab" href="#skills" role="tab">6. Kỹ năng & Thiết bị</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="portfolio-tab" data-toggle="tab" href="#portfolio" role="tab">5. Portfolio (Chủ đề)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ba-tab" data-toggle="tab" href="#ba" role="tab">Before/After</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="feedback-tab" data-toggle="tab" href="#feedback" role="tab">Đánh giá & Case Studies</a>
                    </li>
                </ul>

                <!-- Tabs Content Panels -->
                <div class="tab-content" id="profileTabContent">
                    
                    <!-- TAB 1: Personal Info -->
                    <div class="tab-pane fade show active" id="personal" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tên đầy đủ (Mặc định hệ thống)</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($barber['name']) ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="stage_name" class="font-weight-bold">Nghệ danh / Vị trí hiển thị</label>
                                    <input type="text" name="stage_name" id="stage_name" class="form-control" placeholder="Nghệ danh hoặc chức vụ, ví dụ: Minh Tran Creative" value="<?= htmlspecialchars($profile['stage_name']) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="birthday" class="font-weight-bold">Ngày sinh hiển thị</label>
                                    <input type="text" name="birthday" id="birthday" class="form-control" placeholder="Ví dụ: 31 Tháng Năm 1998" value="<?= htmlspecialchars($profile['birthday']) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="website" class="font-weight-bold">Website/Portfolio online</label>
                                    <input type="url" name="website" id="website" class="form-control" placeholder="https://" value="<?= htmlspecialchars($profile['website']) ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-primary font-weight-bold mb-3">Mạng xã hội (Social Links)</h5>
                                <div class="form-group">
                                    <label for="social_fb" class="font-weight-bold"><i class="fab fa-facebook"></i> Link Facebook</label>
                                    <input type="text" name="social_fb" id="social_fb" class="form-control" placeholder="https://facebook.com/..." value="<?= htmlspecialchars($profile['socials']['facebook'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="social_ig" class="font-weight-bold"><i class="fab fa-instagram"></i> Link Instagram</label>
                                    <input type="text" name="social_ig" id="social_ig" class="form-control" placeholder="https://instagram.com/..." value="<?= htmlspecialchars($profile['socials']['instagram'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="social_bh" class="font-weight-bold"><i class="fab fa-behance"></i> Link Behance</label>
                                    <input type="text" name="social_bh" id="social_bh" class="form-control" placeholder="https://behance.net/..." value="<?= htmlspecialchars($profile['socials']['behance'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="social_tw" class="font-weight-bold"><i class="fab fa-twitter"></i> Link Twitter/X</label>
                                    <input type="text" name="social_tw" id="social_tw" class="form-control" placeholder="https://twitter.com/..." value="<?= htmlspecialchars($profile['socials']['twitter'] ?? '') ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: Bio & Workflow -->
                    <div class="tab-pane fade" id="bio" role="tabpanel">
                        <div class="form-group">
                            <label for="bio_story" class="font-weight-bold">Câu chuyện nghề nghiệp (Bio)</label>
                            <textarea name="bio_story" id="bio_story" class="form-control" rows="4" placeholder="Viết giới thiệu về câu chuyện nghề nghiệp nhiếp ảnh của bạn..."><?= htmlspecialchars($profile['bio']['story'] ?? '') ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bio_style" class="font-weight-bold">Phong cách nhiếp ảnh đặc trưng</label>
                                    <input type="text" name="bio_style" id="bio_style" class="form-control" placeholder="Cinematic, Vintage, Chân dung nghệ thuật..." value="<?= htmlspecialchars($profile['bio']['style'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bio_philosophy" class="font-weight-bold">Triết lý nghệ thuật</label>
                                    <input type="text" name="bio_philosophy" id="bio_philosophy" class="form-control" placeholder="Ví dụ: Bắt trọn cảm xúc trong từng khoảnh khắc..." value="<?= htmlspecialchars($profile['bio']['philosophy'] ?? '') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bio_difference" class="font-weight-bold">Điểm khác biệt</label>
                            <textarea name="bio_difference" id="bio_difference" class="form-control" rows="2" placeholder="Nêu điểm khác biệt, độc đáo trong kỹ năng hay góc chụp của bạn..."><?= htmlspecialchars($profile['bio']['difference'] ?? '') ?></textarea>
                        </div>
                        
                        <hr class="my-4">
                        <h5 class="text-primary font-weight-bold mb-3">Quy trình làm việc (Workflow Steps)</h5>
                        <div class="row">
                            <?php for ($i = 0; $i < 3; $i++): 
                                $wf_step = $profile['workflow'][$i]['step'] ?? ("Bước " . ($i + 1));
                                $wf_detail = $profile['workflow'][$i]['detail'] ?? '';
                            ?>
                                <div class="col-md-4">
                                    <div class="card p-3 bg-light">
                                        <div class="form-group mb-2">
                                            <label class="small font-weight-bold">Tên Bước <?= $i + 1 ?></label>
                                            <input type="text" name="wf_step_<?= $i ?>" class="form-control form-control-sm font-weight-bold text-primary" value="<?= htmlspecialchars($wf_step) ?>">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="small font-weight-bold">Chi tiết công việc</label>
                                            <textarea name="wf_detail_<?= $i ?>" class="form-control form-control-sm" rows="3" placeholder="Tư vấn phong cách, lên ý tưởng..."><?= htmlspecialchars($wf_detail) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <!-- TAB 3: Services & Packages -->
                    <div class="tab-pane fade" id="services" role="tabpanel">
                        <h5 class="text-primary font-weight-bold mb-3">Chuyên môn & Các gói dịch vụ</h5>
                        
                        <?php for ($i = 0; $i < 2; $i++): 
                            $ser_title = $profile['services'][$i]['title'] ?? '';
                            $ser_desc = $profile['services'][$i]['description'] ?? '';
                        ?>
                            <div class="card mb-4 border-left-primary">
                                <div class="card-body">
                                    <h6 class="font-weight-bold text-primary">Lĩnh vực chuyên sâu <?= $i + 1 ?></h6>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Tên Lĩnh vực / Dịch vụ</label>
                                                <input type="text" name="service_title_<?= $i ?>" class="form-control" placeholder="Chụp ảnh chân dung" value="<?= htmlspecialchars($ser_title) ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Mô tả dịch vụ</label>
                                                <textarea name="service_desc_<?= $i ?>" class="form-control" rows="3" placeholder="Giới thiệu về dịch vụ này..."><?= htmlspecialchars($ser_desc) ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-8">
                                            <label class="font-weight-bold text-dark"><i class="fas fa-tags text-warning"></i> Các gói dịch vụ đi kèm (Tối đa 2 gói)</label>
                                            <div class="row">
                                                <?php for ($j = 0; $j < 2; $j++): 
                                                    $pkg_name = $profile['services'][$i]['packages'][$j]['name'] ?? '';
                                                    $pkg_price = $profile['services'][$i]['packages'][$j]['price'] ?? '';
                                                    $pkg_feat = $profile['services'][$i]['packages'][$j]['features'] ?? '';
                                                ?>
                                                    <div class="col-md-6 mb-2">
                                                        <div class="card p-2 bg-light">
                                                            <div class="form-group mb-1">
                                                                <input type="text" name="service_<?= $i ?>_pkg_name_<?= $j ?>" class="form-control form-control-sm font-weight-bold" placeholder="Tên gói (Ví dụ: Gói Basic)" value="<?= htmlspecialchars($pkg_name) ?>">
                                                            </div>
                                                            <div class="form-group mb-1">
                                                                <input type="text" name="service_<?= $i ?>_pkg_price_<?= $j ?>" class="form-control form-control-sm text-success font-weight-bold" placeholder="Giá tiền (Ví dụ: 1.500.000đ)" value="<?= htmlspecialchars($pkg_price) ?>">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <textarea name="service_<?= $i ?>_pkg_feat_<?= $j ?>" class="form-control form-control-sm" rows="2" placeholder="Tính năng (Chụp 1h, 15 ảnh...)"><?= htmlspecialchars($pkg_feat) ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <!-- TAB 4: Experience & Education -->
                    <div class="tab-pane fade" id="resume" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-primary font-weight-bold mb-3">Kinh nghiệm & Thành tích</h5>
                                <div class="form-group">
                                    <label for="exp_years" class="font-weight-bold">Số năm kinh nghiệm</label>
                                    <input type="text" name="exp_years" id="exp_years" class="form-control" placeholder="Ví dụ: 5 năm kinh nghiệm" value="<?= htmlspecialchars($profile['experience']['years'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exp_projects" class="font-weight-bold">Các dự án nổi bật (Mỗi dòng một dự án)</label>
                                    <textarea name="exp_projects" id="exp_projects" class="form-control" rows="4" placeholder="Ví dụ: Bộ sưu tập Nắng Thủy Tinh (2023)"><?= htmlspecialchars(implode("\n", $profile['experience']['projects'] ?? [])) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exp_awards" class="font-weight-bold">Giải thưởng đạt được (Mỗi dòng một giải)</label>
                                    <textarea name="exp_awards" id="exp_awards" class="form-control" rows="3" placeholder="Ví dụ: Giải Nhất Fine Art Contest 2023"><?= htmlspecialchars(implode("\n", $profile['experience']['awards'] ?? [])) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exp_clients" class="font-weight-bold">Khách hàng tiêu biểu (Phân cách bằng dấu phẩy)</label>
                                    <input type="text" name="exp_clients" id="exp_clients" class="form-control" placeholder="Dake Studio, Tạp chí Đẹp" value="<?= htmlspecialchars(implode(", ", $profile['experience']['clients'] ?? [])) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exp_media" class="font-weight-bold">Báo chí/tạp chí đăng tải (Mỗi dòng một mục)</label>
                                    <textarea name="exp_media" id="exp_media" class="form-control" rows="3" placeholder="Đăng tải trên tạp chí Heritage (Số 10/2023)"><?= htmlspecialchars(implode("\n", $profile['experience']['media'] ?? [])) ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-primary font-weight-bold mb-3">Học vấn & Chứng chỉ</h5>
                                
                                <div class="form-group">
                                    <label for="certifications" class="font-weight-bold">Chứng chỉ chuyên môn (Mỗi dòng một chứng chỉ)</label>
                                    <textarea name="certifications" id="certifications" class="form-control" rows="4" placeholder="Chứng nhận Nhiếp ảnh gia chuyên nghiệp (2021)"><?= htmlspecialchars(implode("\n", $profile['certifications'] ?? [])) ?></textarea>
                                </div>
                                
                                <label class="font-weight-bold text-dark mt-2">Học vấn & Workshop (Tối đa 3 mục)</label>
                                <?php for ($i = 0; $i < 3; $i++): 
                                    $edu_degree = $profile['education'][$i]['degree'] ?? '';
                                    $edu_school = $profile['education'][$i]['school'] ?? '';
                                    $edu_year = $profile['education'][$i]['year'] ?? '';
                                ?>
                                    <div class="card p-2 bg-light mb-2">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="edu_degree_<?= $i ?>" class="form-control form-control-sm" placeholder="Bằng cấp / Khóa học" value="<?= htmlspecialchars($edu_degree) ?>">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="edu_school_<?= $i ?>" class="form-control form-control-sm" placeholder="Trường / Đơn vị cấp" value="<?= htmlspecialchars($edu_school) ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="edu_year_<?= $i ?>" class="form-control form-control-sm" placeholder="Năm" value="<?= htmlspecialchars($edu_year) ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 5: Skills & Gear -->
                    <div class="tab-pane fade" id="skills" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skills_list" class="font-weight-bold">Kỹ năng chuyên môn (Phân cách bằng dấu phẩy)</label>
                                    <input type="text" name="skills_list" id="skills_list" class="form-control" placeholder="Composition, Lighting, Portraiture" value="<?= htmlspecialchars(implode(", ", $profile['skills'] ?? [])) ?>">
                                    <small class="form-text text-muted">Ví dụ: Bố cục, Ánh sáng studio, Retouching</small>
                                </div>
                                <div class="form-group">
                                    <label for="software_list" class="font-weight-bold">Phần mềm thành thạo (Phân cách bằng dấu phẩy)</label>
                                    <input type="text" name="software_list" id="software_list" class="form-control" placeholder="Adobe Photoshop, Lightroom, Capture One" value="<?= htmlspecialchars(implode(", ", $profile['software'] ?? [])) ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 bg-light">
                                    <h6 class="font-weight-bold text-dark mb-3"><i class="fas fa-camera"></i> Thiết bị sử dụng (Phân cách bằng dấu phẩy)</h6>
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Thân máy (Cameras)</label>
                                        <input type="text" name="gear_cameras" class="form-control" placeholder="Sony A7R V, Canon R5" value="<?= htmlspecialchars(implode(", ", $profile['equipment']['cameras'] ?? [])) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Ống kính (Lenses)</label>
                                        <input type="text" name="gear_lenses" class="form-control" placeholder="FE 85mm f/1.4 GM, RF 50mm f/1.2" value="<?= htmlspecialchars(implode(", ", $profile['equipment']['lenses'] ?? [])) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="small font-weight-bold">Thiết bị ánh sáng (Lighting)</label>
                                        <input type="text" name="gear_lighting" class="form-control" placeholder="Profoto A10, Godox AD600" value="<?= htmlspecialchars(implode(", ", $profile['equipment']['lighting'] ?? [])) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 6: Categorized Portfolio -->
                    <div class="tab-pane fade" id="portfolio" role="tabpanel">
                        <h5 class="text-primary font-weight-bold mb-3">Phân loại Portfolio theo chủ đề / dự án</h5>
                        
                        <?php for ($i = 0; $i < 2; $i++): 
                            $cat_name = $profile['portfolio_categories'][$i]['name'] ?? ("Chủ đề " . ($i + 1));
                            $cat_imgs = $profile['portfolio_categories'][$i]['images'] ?? [];
                        ?>
                            <div class="card mb-3 p-3 border-left-info bg-light">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tên chủ đề / dự án</label>
                                            <input type="text" name="portfolio_cat_name_<?= $i ?>" class="form-control font-weight-bold text-dark" placeholder="Ví dụ: Chân dung (Portrait)" value="<?= htmlspecialchars($cat_name) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="small font-weight-bold"><i class="fas fa-plus-circle"></i> Tải ảnh mới lên Chủ đề này</label>
                                            <input type="file" name="portfolio_cat_uploads_<?= $i ?>[]" class="form-control-file" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tên file ảnh hiện tại (Phân cách bằng dấu phẩy)</label>
                                            <textarea name="portfolio_cat_imgs_<?= $i ?>" class="form-control" rows="2" placeholder="t1.jpg, t2.jpg..."><?= htmlspecialchars(implode(", ", $cat_imgs)) ?></textarea>
                                        </div>
                                        
                                        <?php if (!empty($cat_imgs)): ?>
                                            <div class="d-flex flex-wrap gap-1 p-1 bg-white rounded border" style="max-height: 120px; overflow-y: auto;">
                                                <?php foreach ($cat_imgs as $img): ?>
                                                    <div class="m-1 text-center">
                                                        <img src="../images/users/<?= htmlspecialchars($img) ?>" class="rounded border" style="width: 45px; height: 45px; object-fit: cover;" onerror="this.src='../images/users/t1.jpg'">
                                                        <span class="d-block small text-truncate" style="width: 45px; font-size: 8px;"><?= htmlspecialchars($img) ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <!-- TAB 7: Before / After -->
                    <div class="tab-pane fade" id="ba" role="tabpanel">
                        <h5 class="text-primary font-weight-bold mb-3">So sánh ảnh Hậu kỳ (Before & After)</h5>
                        <div class="row">
                            <?php for ($i = 0; $i < 2; $i++): 
                                $ba_title = $profile['before_after'][$i]['title'] ?? '';
                                $ba_before = $profile['before_after'][$i]['before'] ?? '';
                                $ba_after = $profile['before_after'][$i]['after'] ?? '';
                            ?>
                                <div class="col-md-6 mb-3">
                                    <div class="card p-3 bg-light border-left-warning">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tiêu đề ảnh so sánh</label>
                                            <input type="text" name="ba_title_<?= $i ?>" class="form-control form-control-sm" placeholder="Ví dụ: Retouch ánh sáng cưới" value="<?= htmlspecialchars($ba_title) ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="small font-weight-bold">Ảnh Gốc (Before)</label>
                                                <input type="file" name="ba_before_upload_<?= $i ?>" class="form-control-file mb-2">
                                                <input type="hidden" name="existing_ba_before_<?= $i ?>" value="<?= htmlspecialchars($ba_before) ?>">
                                                <?php if ($ba_before): ?>
                                                    <img src="../images/users/<?= htmlspecialchars($ba_before) ?>" class="img-thumbnail" style="height: 80px; object-fit: cover;" onerror="this.src='../images/users/t3.jpg'">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="small font-weight-bold">Ảnh Sau Hậu Kỳ (After)</label>
                                                <input type="file" name="ba_after_upload_<?= $i ?>" class="form-control-file mb-2">
                                                <input type="hidden" name="existing_ba_after_<?= $i ?>" value="<?= htmlspecialchars($ba_after) ?>">
                                                <?php if ($ba_after): ?>
                                                    <img src="../images/users/<?= htmlspecialchars($ba_after) ?>" class="img-thumbnail" style="height: 80px; object-fit: cover;" onerror="this.src='../images/users/t4.jpg'">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <!-- TAB 8: Testimonials & Case Studies -->
                    <div class="tab-pane fade" id="feedback" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-primary font-weight-bold mb-3">Phản hồi của Khách hàng (Testimonials)</h5>
                                <?php for ($i = 0; $i < 2; $i++): 
                                    $t_name = $profile['testimonials'][$i]['client_name'] ?? '';
                                    $t_comment = $profile['testimonials'][$i]['comment'] ?? '';
                                    $t_rating = $profile['testimonials'][$i]['rating'] ?? 5;
                                    $t_avatar = $profile['testimonials'][$i]['avatar'] ?? '';
                                ?>
                                    <div class="card p-3 mb-3 bg-light">
                                        <div class="form-group mb-2">
                                            <label class="small font-weight-bold">Tên khách hàng</label>
                                            <input type="text" name="test_name_<?= $i ?>" class="form-control form-control-sm" placeholder="Tên khách hàng" value="<?= htmlspecialchars($t_name) ?>">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="small font-weight-bold">Nội dung nhận xét</label>
                                            <textarea name="test_comment_<?= $i ?>" class="form-control form-control-sm" rows="2" placeholder="Dịch vụ tuyệt vời..."><?= htmlspecialchars($t_comment) ?></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="small font-weight-bold">Đánh giá Sao</label>
                                                <select name="test_rating_<?= $i ?>" class="form-control form-control-sm">
                                                    <option value="5" <?= $t_rating == 5 ? 'selected' : '' ?>>5 Sao</option>
                                                    <option value="4" <?= $t_rating == 4 ? 'selected' : '' ?>>4 Sao</option>
                                                    <option value="3" <?= $t_rating == 3 ? 'selected' : '' ?>>3 Sao</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="small font-weight-bold">Avatar</label>
                                                <input type="file" name="test_avatar_<?= $i ?>" class="form-control-file">
                                                <input type="hidden" name="existing_test_avatar_<?= $i ?>" value="<?= htmlspecialchars($t_avatar) ?>">
                                                <?php if ($t_avatar): ?>
                                                    <img src="../images/users/<?= htmlspecialchars($t_avatar) ?>" class="rounded-circle mt-1 border" style="width: 30px; height: 30px; object-fit: cover;" onerror="this.src='../images/users/t1.jpg'">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-primary font-weight-bold mb-3">Case Studies tiêu biểu (Giải quyết dự án thực tế)</h5>
                                <?php for ($i = 0; $i < 2; $i++): 
                                    $cs_title = $profile['case_studies'][$i]['title'] ?? '';
                                    $cs_challenge = $profile['case_studies'][$i]['challenge'] ?? '';
                                    $cs_solution = $profile['case_studies'][$i]['solution'] ?? '';
                                    $cs_result = $profile['case_studies'][$i]['result'] ?? '';
                                ?>
                                    <div class="card p-3 mb-3 bg-light border-left-info">
                                        <div class="form-group mb-2">
                                            <label class="small font-weight-bold">Tên dự án Case Study</label>
                                            <input type="text" name="cs_title_<?= $i ?>" class="form-control form-control-sm font-weight-bold" placeholder="Ví dụ: Lookbook hè Dake Brand" value="<?= htmlspecialchars($cs_title) ?>">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="small font-weight-bold">Thử thách (Challenge)</label>
                                            <input type="text" name="cs_challenge_<?= $i ?>" class="form-control form-control-sm" placeholder="Thử thách về thời tiết, ánh sáng..." value="<?= htmlspecialchars($cs_challenge) ?>">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="small font-weight-bold">Giải pháp (Solution)</label>
                                            <input type="text" name="cs_solution_<?= $i ?>" class="form-control form-control-sm" placeholder="Dùng đèn phụ trợ, kĩ thuật gì..." value="<?= htmlspecialchars($cs_solution) ?>">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="small font-weight-bold">Kết quả (Result)</label>
                                            <input type="text" name="cs_result_<?= $i ?>" class="form-control form-control-sm" placeholder="Tăng 25% doanh số, ảnh sắc nét..." value="<?= htmlspecialchars($cs_result) ?>">
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="my-4">
                <button type="submit" name="btnupdate" class="btn btn-primary btn-lg shadow-sm"><i class="fas fa-save"></i> Ghi lại toàn bộ Profile</button>
            </form>
        </div>
    </div>
</div>
