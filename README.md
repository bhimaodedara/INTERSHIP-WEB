HOSTED WEB - gppweb.free.je

ADMIN USER - admin

ADMIN PASS - admin123

Institutional Admission & Management Portal

A full-stack web application designed for Government Polytechnic, Porbandar, featuring a public-facing informative website, an online student application engine, integrated security frameworks, and a robust administrative desk.
🚀 Key Functional Modules
1. Administrative Control Desk

   - Dynamic Content Management: Admins can seamlessly add, edit, and update faculty profiles, campus infrastructure/classrooms, and institutional event galleries directly from the dashboard, projecting changes live onto the public site.

   - Student Application Pipeline: Real-time monitoring of all incoming student admissions. Admins can view uploaded credentials (mark sheets), search records, and execute one-click Accept or Reject actions.

   - Audit Trails & Logging: Automatic tracking systems that log administrative actions (e.g., status updates) into a secured internal activity table.

2. Public Information Engine

  - Dynamic Sections: Home, Faculty Directory, Infrastructure Gallery, and Classrooms panels automatically pull structured layout parameters straight from the database.

  - Contact & Grievance Form: A dedicated interface enabling students and parents to submit questions, seamlessly saving queries to the backend for administrative review.

3. Online Application Process

  -  Data Ingestion: Students select their desired engineering stream (Computer, Electrical, Civil, or Mechanical) and fill out structured data input fields.

  - Document Upload Engine: A multi-layered validation subsystem that processes, renames with an isolated unique identifier, and stores academic mark sheets safely onto the server system.

4. Financial Checkout & Payment Gateway

  - Razorpay Core Integration: Seamless transition from application approval to financial checkout using the Razorpay API.

  - Unique Token Generation: System dynamically bundles unique authorization tokens mapped to student IDs to avoid session hijacking or transaction falsification.

🛠️ Advanced Technologies & Integrations

The architecture utilizes a blend of core programming and modern external API engines:
⚡ Async Processing & Client Validations

   - AJAX (Asynchronous JavaScript and XML): Employed for processing data streams in the background (such as dashboard metric updates and fast state changes) without triggering disruptive browser page refreshes.

     - Strict Regular Expressions (Regex): * Name Validation: /^[a-zA-Z ]+$/ restricts inputs entirely to letters and spacing vectors.

        -Email Ingestion: /[\w\.-]+@[\w\.-]+\.\w+$/ checks for correct global formatting configurations.

        -Indian Phone Numbers: /^[6-9]\d{9}$/ enforces strict 10-digit mobile architectures beginning exclusively with valid network starter numerals.

🔐 Security & Anti-Bot Shielding

  - Google reCAPTCHA v2: A cURL-verified "I'm not a robot" security barrier integrated right before database entry loops to halt automated credential-stuffing attacks.

   -SQL Injection Countermeasures: Complete sanitization of client inputs across all pathways via mysqli_real_escape_string() and strict backend data-type casting rules.

📧 Automated Mail Distribution & Document Compiling

   - PHPMailer Engine: Authenticated securely through Google's App Password pipeline to distribute admission statuses directly to student inboxes.

   - FPDF Library & Dynamic QR Generation: Upon approval, the server isolates output buffers (ob_start), compiles a crisp Provisional Selection Letter PDF file, encodes a custom Razorpay/payment endpoint URL into a unique QR code, embeds the image, and sends it directly as an email attachment.

   - Buffered Temp-File Processing: Writes data streams cleanly into system temp space (sys_get_temp_dir()) using a rigid parameter order ($pdf->Output($path, 'F')) to guarantee 0-byte prevention before automatic system cleanup sweeps (unlink).

📁 Technical Architecture
Plaintext

📦 GPP-WEB-ORGANIZED
├── 📂 admin                  # Secured Administrative workspace panels
│   ├── 📄 manage_applications.php # Main admission evaluation processor
│   └── 📄 fpdf.php           # Core document generator component
├── 📂 assets                 # Styling rulesheets, scripts, and branding graphics
├── 📂 config                 # Shared database routing configuration links
│   └── 📄 db_connect.php     # Global MySQLi connection instance
├── 📂 qr_images              # Dynamically compiled payment QR codes
├── 📂 uploads                # Encrypted directory holding submitted student credentials
├── 📂 vendor                 # Production dependency storage (PHPMailer)
├── 📄 index.php              # Primary home landing showcase entry point
└── 📄 apply.php              # Public registration module with Google reCAPTCHA

💻 Local Installation Guide

Follow these steps to spin up the portal locally inside your XAMPP stack:

   - Clone the Repository:
   - Bash

   - (https://github.com/YOURUSERNAME/INTERSHIP-WEB/tree/main)

   - Move to Server Root:
   - Drop the cloned folder directory inside your XAMPP htdocs/ folder.

   - Database Migration:

       - Launch your web browser and access http://localhost/phpmyadmin.

       - Create a new database workspace.

       - Go to Import, select your local structural backup file (e.g., database_backup.sql), and run it.

   - Configure Connections:

       - Open config/db_connect.php and update your local database credentials.

       - Open admin/manage_applications.php and assign your personal Google App Password token string into the PHPMailer authentication section.

     Run the Application:
     Open your browser and navigate to http://gppweb.free.je
