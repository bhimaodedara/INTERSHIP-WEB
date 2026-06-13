<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science Labs</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Single Navigation -->
    <header class="bg-white shadow-sm sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <!-- Replace with actual logo URL -->
                     <img src="assets/images/main logo.jpeg" alt="University Logo" height="60">

                    </div>
                    <div class="d-flex flex-column">
                        <h1 class="fs-4 mb-0" style="color: #2c3e50;">Computer Engineering Department</h1>
                        <span class="fs-6" style="color: #3498db;">Excellence in Education Since 1960</span>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="lab.php">Labs</a></li>
                        <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty.php">Faculty</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="classroom.php">classrooms</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="text-white py-5" style="
        background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.9)), 
                    url('https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
    ">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Computer Science Labs</h1>
            <p class="lead">State-of-the-Art Facilities for Hands-On Learning</p>
            <p>At the Computer Science Department, we believe in providing students with a hands-on experience to
                complement their theoretical learning. Our labs are equipped with the latest technology, software, and
                resources to ensure that students get the best practical exposure to current industry standards.</p>
        </div>
    </section>

    <!-- Available Labs Section -->
    <section id="labs" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 15px;">Available Labs</h2>

            <div class="row">
                <!-- Programming Lab -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px; transition: transform 0.3s ease;">
                        <div class="card-header text-white" style="background-color: #2c3e50; border-radius: 10px 10px 0 0;">
                            <span class="d-inline-block rounded-circle text-center me-2" style="width: 40px; height: 40px; line-height: 40px; background-color: #3498db;">1</span>
                            <h5 class="card-title mb-0 d-inline-block">Programming Lab</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Purpose:</strong> Dedicated space for learning and
                                experimenting with programming languages, coding techniques, and software development
                                methodologies.</p>
                            <p><strong>Key Tools:</strong> Visual Studio, Eclipse, PyCharm, IntelliJ IDEA, Git, and
                                more.</p>
                            <p><strong>Languages:</strong> Python, Java, C++, JavaScript, and more.</p>
                            <p><strong>Focus:</strong> Problem-solving, algorithm design, data structures, and
                                object-oriented programming.</p>
                        </div>
                    </div>
                </div>

                <!-- Network & Cybersecurity Lab -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px; transition: transform 0.3s ease;">
                        <div class="card-header text-white" style="background-color: #2c3e50; border-radius: 10px 10px 0 0;">
                            <span class="d-inline-block rounded-circle text-center me-2" style="width: 40px; height: 40px; line-height: 40px; background-color: #3498db;">2</span>
                            <h5 class="card-title mb-0 d-inline-block">Network & Cybersecurity Lab</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Purpose:</strong> A specialized lab for exploring network
                                infrastructure, cybersecurity protocols, and ethical hacking.</p>
                            <p><strong>Key Tools:</strong> Wireshark, Kali Linux, Metasploit, Cisco Packet Tracer, and
                                various network simulators.</p>
                            <p><strong>Focus:</strong> Network setup, security analysis, penetration testing, and
                                ethical hacking practices.</p>
                        </div>
                    </div>
                </div>

                <!-- Database & Data Science Lab -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px; transition: transform 0.3s ease;">
                        <div class="card-header text-white" style="background-color: #2c3e50; border-radius: 10px 10px 0 0;">
                            <span class="d-inline-block rounded-circle text-center me-2" style="width: 40px; height: 40px; line-height: 40px; background-color: #3498db;">3</span>
                            <h5 class="card-title mb-0 d-inline-block">Database & Data Science Lab</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Purpose:</strong> This lab provides an environment for students
                                to design and manage databases, analyze large datasets, and implement machine learning
                                algorithms.</p>
                            <p><strong>Key Tools:</strong> MySQL, PostgreSQL, MongoDB, Apache Hadoop, R, and TensorFlow.
                            </p>
                            <p><strong>Focus:</strong> Database management, data analysis, data mining, and machine
                                learning.</p>
                        </div>
                    </div>
                </div>

                <!-- AI & Robotics Lab -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px; transition: transform 0.3s ease;">
                        <div class="card-header text-white" style="background-color: #2c3e50; border-radius: 10px 10px 0 0;">
                            <span class="d-inline-block rounded-circle text-center me-2" style="width: 40px; height: 40px; line-height: 40px; background-color: #3498db;">4</span>
                            <h5 class="card-title mb-0 d-inline-block">Artificial Intelligence & Robotics Lab</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Purpose:</strong> A cutting-edge space for experimenting with
                                AI algorithms and robotics applications, allowing students to build intelligent systems.
                            </p>
                            <p><strong>Key Tools:</strong> MATLAB, OpenCV, TensorFlow, Arduino, Raspberry Pi, and
                                various robotics kits.</p>
                            <p><strong>Focus:</strong> Machine learning, computer vision, robotics, natural language
                                processing (NLP), and deep learning.</p>
                        </div>
                    </div>
                </div>

                <!-- Web Development Lab -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px; transition: transform 0.3s ease;">
                        <div class="card-header text-white" style="background-color: #2c3e50; border-radius: 10px 10px 0 0;">
                            <span class="d-inline-block rounded-circle text-center me-2" style="width: 40px; height: 40px; line-height: 40px; background-color: #3498db;">5</span>
                            <h5 class="card-title mb-0 d-inline-block">Web Development & UI/UX Lab</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Purpose:</strong> A creative space for students to design,
                                develop, and test websites and applications, focusing on user-centered design and
                                front-end/back-end integration.</p>
                            <p><strong>Key Tools:</strong> HTML, CSS, JavaScript, React, Angular, Bootstrap, Node.js,
                                and Firebase.</p>
                            <p><strong>Focus:</strong> Web development, UI/UX design, front-end and back-end frameworks,
                                and responsive design.</p>
                        </div>
                    </div>
                </div>

                <!-- Cloud Computing Lab -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px; transition: transform 0.3s ease;">
                        <div class="card-header text-white" style="background-color: #2c3e50; border-radius: 10px 10px 0 0;">
                            <span class="d-inline-block rounded-circle text-center me-2" style="width: 40px; height: 40px; line-height: 40px; background-color: #3498db;">6</span>
                            <h5 class="card-title mb-0 d-inline-block">Cloud Computing & Virtualization Lab</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Purpose:</strong> A high-performance lab for exploring cloud
                                services, virtualization technologies, and distributed computing.</p>
                            <p><strong>Key Tools:</strong> Amazon Web Services (AWS), Microsoft Azure, Google Cloud,
                                Docker, Kubernetes, and VMware.</p>
                            <p><strong>Focus:</strong> Cloud deployment, virtualization, containerization, and scalable
                                infrastructure.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lab Features Section -->
    <section id="features" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 15px;">Lab Features</h2>

            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <strong>High-Speed Internet Access:</strong> Reliable and fast internet access to support
                            research and project work.
                        </li>
                        <li class="mb-3">
                            <strong>24/7 Access:</strong> Many of our labs are accessible outside regular class hours to
                            encourage self-paced learning and collaboration.
                        </li>
                        <li class="mb-3">
                            <strong>Industry-Standard Tools:</strong> Our labs are equipped with the latest software and
                            hardware to ensure students are trained on the tools they will encounter in the real world.
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <strong>Collaborative Spaces:</strong> Group workstations and collaborative spaces to foster
                            teamwork and idea sharing.
                        </li>
                        <li class="mb-3">
                            <strong>Expert Faculty:</strong> Faculty members with real-world industry experience provide
                            guidance and mentorship to students working on lab projects.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-5" style="background-color: #ecf0f1;">
        <div class="container">
            <h2 class="text-center mb-5" style="color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 15px;">Benefits of Lab Work</h2>

            <div class="row">
                <div class="col-md-3 text-center mb-4">
                    <div class="mb-3" style="font-size: 4rem;">💻</div>
                    <h4>Practical Learning</h4>
                    <p>Gain hands-on experience and practical skills that are crucial in the tech industry.</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="mb-3" style="font-size: 3rem;">🚀</div>
                    <h4>Innovative Projects</h4>
                    <p>Work on cutting-edge projects that involve real-world applications, from building mobile apps
                        to creating machine learning models.</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="mb-3" style="font-size: 4rem;">👥</div>
                    <h4>Collaborative Environment</h4>
                    <p>Collaborate with peers on projects and develop essential teamwork and communication skills.
                    </p>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="mb-3" style="font-size: 4rem;">🔬</div>
                    <h4>Research Opportunities</h4>
                    <p>Conduct research in specialized fields such as AI, cybersecurity, and cloud computing.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking" class="py-5 text-white" style="background-color: #2c3e50;">
        <div class="container text-center">
            <h2 class="mb-5" style="border-bottom: 2px solid white; display: inline-block; padding-bottom: 15px;">Booking and Access</h2>
            <p class="lead">All students must book lab sessions in advance through our Online Lab Booking System. For
                specific lab schedules, please visit the Timetable Section of the website.</p>
            <p>Whether you're learning to write your first line of code or working on your final-year project, our labs
                are designed to provide you with everything you need to succeed in the ever-evolving field of computer
                science.</p>
            <a href="#" class="btn mt-4 text-white" style="background-color: #3498db; padding: 12px 30px;">Book Lab Session</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-white" style="background-color: #2c3e50;">
        <div class="container text-center">
            <p>&copy; 2023 Computer Science Department. All rights reserved.</p>
            <p>Contact: cs-labs@university.edu | Phone: (123) 456-7890</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <!-- Add hover effect for cards -->
   
    </script>
    <script src="assets/js/dark-mode.js"></script>
        <!-- Your existing footer and scripts -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Add dark mode script -->
    <script src="assets/js/dark-mode.js"></script>

</body>

</html>