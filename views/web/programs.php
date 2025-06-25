<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programs</title>
  <?php require_once '../../components/styles.php'; ?>
</head>
<body>
  <?php include_once '../../components/header.php'; ?>

  <!-- page title -->
  <section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item">
              <a class="h2 text-primary font-secondary" href="courses.html">Our Courses</a>
            </li>
          </ul>
          <p class="text-lighten">
            Our school offers a comprehensive and vast educational experience that supports students' growth and development across academics, co-curricular, and social development.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- courses -->
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <?php
        // Array of main courses
        $main_courses = [
          [
            'img' => '../../TEMPLATE/educenter/images/courses/Childhood.avif',
            'title' => 'Kindergarten',
            'desc' => 'Emphasizes play-based learning, literacy and numeracy foundations and social development'
          ],
          [
            'img' => '../../TEMPLATE/educenter/images/courses/primary 001.jpg',
            'title' => 'Primary school',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.'
          ],
          [
            'img' => '../../TEMPLATE/educenter/images/courses/secondary.png',
            'title' => 'Secondary School',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.'
          ]
        ];
        foreach ($main_courses as $course): ?>
          <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card p-0 border-primary rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="<?= $course['img'] ?>" alt="course thumb">
              <div class="card-body">
                <ul class="list-inline mb-2">
                  <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
                  <li class="list-inline-item"><a class="text-color" href="courses.html#">Humanities</a></li>
                </ul>
                <a href="course-single.html">
                  <h4 class="card-title"><?= $course['title'] ?></h4>
                </a>
                <p class="card-text mb-4"><?= $course['desc'] ?></p>
                <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Co-curricular & Extra Curricular -->
      <div class="row">
        <div class="col-12">
          <h2 class="section-title text-center">CO-CURRICULAR & EXTRA CURRICULAR</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php
        $extra_courses = [
          [
            'img' => 'images/courses/course-4.jpg',
            'title' => 'Co-curricular & Extra curricular Activities',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.'
          ],
          [
            'img' => 'images/courses/course-5.jpg',
            'title' => 'Special Programs',
            'desc' => '* STEM/STEAM enrichment activities and projects'
          ],
          [
            'img' => 'images/courses/course-6.jpg',
            'title' => 'Art Design',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.'
          ]
        ];
        foreach ($extra_courses as $course): ?>
          <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card p-0 border-primary rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="<?= $course['img'] ?>" alt="course thumb">
              <div class="card-body">
                <ul class="list-inline mb-2">
                  <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
                  <li class="list-inline-item"><a class="text-color" href="courses.html#">Humanities</a></li>
                </ul>
                <a href="course-single.html">
                  <h4 class="card-title"><?= $course['title'] ?></h4>
                  <?php if ($course['title'] === 'Special Programs'): ?>
                    <p><?= $course['desc'] ?></p>
                  <?php endif; ?>
                </a>
                <?php if ($course['title'] !== 'Special Programs'): ?>
                  <p class="card-text mb-4"><?= $course['desc'] ?></p>
                <?php endif; ?>
                <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Other Courses -->
      <div class="row justify-content-center">
        <?php
        $other_courses = [
          [
            'img' => 'images/courses/course-1.jpg',
            'title' => 'Photography'
          ],
          [
            'img' => 'images/courses/course-2.jpg',
            'title' => 'Programming'
          ],
          [
            'img' => 'images/courses/course-3.jpg',
            'title' => 'Lifestyle Archives'
          ],
          [
            'img' => 'images/courses/course-4.jpg',
            'title' => 'Complete Freelancing'
          ],
          [
            'img' => 'images/courses/course-5.jpg',
            'title' => 'Branding Design'
          ],
          [
            'img' => 'images/courses/course-6.jpg',
            'title' => 'Art Design'
          ]
        ];
        foreach ($other_courses as $course): ?>
          <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card p-0 border-primary rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="<?= $course['img'] ?>" alt="course thumb">
              <div class="card-body">
                <ul class="list-inline mb-2">
                  <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
                  <li class="list-inline-item"><a class="text-color" href="courses.html#">Humanities</a></li>
                </ul>
                <a href="course-single.html">
                  <h4 class="card-title"><?= $course['title'] ?></h4>
                </a>
                <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- /courses -->

  <?php include_once '../../components/footer.php'; ?>
  <?php include_once '../../components/scripts.php'; ?>
</body>
</html>
