# JobSphere - Web-Based Job Portal

## 🌟 Project Overview

JobSphere is a comprehensive web-based job portal designed to bridge the gap between job seekers and employers. Built using modern web technologies including HTML, CSS, JavaScript, PHP, and MySQL, the platform provides an intuitive interface for job searching, application management, and recruitment processes.

### Key Highlights

- **Multi-user system** supporting job seekers, employers, and administrators
- **Responsive design** for seamless experience across all devices
- **Secure authentication** with password hashing
- **Real-time job search** functionality
- **File upload capabilities** for resumes and company logos

## 🚀 Installation Instructions

### Prerequisites

- **XAMPP** (or similar web server stack with Apache, MySQL, PHP)
- **PHP** version 7.4 or higher
- **MySQL** version 5.7 or higher
- **Web browser** (Chrome, Firefox, Safari, or Edge - latest versions)

### Step-by-Step Setup

1. **Install XAMPP**

   ```bash
   # Download XAMPP from https://www.apachefriends.org/
   # Install with default settings
   ```

2. **Clone/Download the Project**

   ```bash
   # Place the project folder in XAMPP htdocs directory
   C:\xampp\htdocs\job-sphere-web
   ```

3. **Start XAMPP Services**

   - Open XAMPP Control Panel
   - Start Apache and MySQL services

4. **Database Setup**

   - Open phpMyAdmin: `http://localhost/phpmyadmin`
   - Create a new database named `jobsphere_db`
   - Import the database:
     - Click on the `jobsphere_db` database
     - Go to "Import" tab
     - Choose file: `sitemap/database/jobsphere_db.sql`
     - Click "Go" to import

5. **Configure Database Connection**

   - Open `includes/config.php`
   - Verify/update database credentials if needed:

   ```php
   $db_server = 'localhost';
   $db_username = 'root';
   $db_password = '';  // Leave empty for default XAMPP
   $db_name = 'jobsphere_db';
   ```

6. **Access the Application**
   - Open your browser and navigate to: `http://localhost/job-sphere-web`

## 📖 Usage Guide

### For Job Seekers

1. **Registration**

   - Click "Sign up" and select "Job Seeker" as user type
   - Complete the registration form with your details

2. **Job Search**

   - Browse all jobs on the Jobs page
   - Use the search bar to find specific positions
   - Filter by job title, company, or description

3. **Job Application**
   - Click "Apply Now" on any job listing
   - Fill in the application form
   - Upload your resume (PDF format, max 5MB)
   - Submit your application

### For Employers

1. **Registration**

   - Sign up with "Employer" user type
   - Complete your company profile

2. **Post Jobs**

   - Navigate to "Post Job" after logging in
   - Fill in job details including:
     - Company name and logo
     - Job title and level
     - Job description
     - Salary range
   - Submit to publish the listing

3. **Manage Applications**
   - View all applications in the Application section
   - Review candidate details and resumes
   - Edit or delete job postings as needed

### For Administrators

- Access all employer features
- View and manage user inquiries
- Moderate job listings
- Manage user accounts

### Default Admin Credentials

```
Email: admin@jobsphere.com
Password: 123
```

## 🛠️ Features

### Core Features

- **User Authentication**

  - Secure registration and login system
  - Password hashing using bcrypt
  - Session management
  - Three user roles: Job Seeker, Employer, Admin

- **Job Management**

  - Post new job listings with detailed information
  - Edit and delete job postings
  - Upload company logos (JPG, PNG, GIF - max 2MB)
  - Real-time job listings on homepage

- **Search Functionality**

  - Full-text search across job titles, companies, and descriptions
  - Search results highlighting
  - No results feedback

- **Application System**

  - Online application forms
  - Resume upload (PDF only, max 5MB)
  - Application tracking
  - Automatic job details population

- **Responsive Design**
  - Mobile-first approach
  - Hamburger menu for mobile navigation
  - Touch-friendly interface
  - Optimized for all screen sizes

### Additional Features

- Contact form for inquiries
- Image gallery
- About page with company information
- Admin dashboard for inquiry management

## 📁 Project Structure

```
job-sphere-web/
├── css/
│   └── style.css                 # Main stylesheet with responsive design
├── images/
│   ├── company logos (PNG files)
│   ├── icons/
│   │   └── search-icon.svg
│   └── site images
├── includes/
│   ├── config.php               # Database configuration
│   ├── footer.php               # Footer component
│   ├── head.php                 # HTML head elements
│   ├── logout.php               # Logout functionality
│   └── navbar.php               # Navigation bar with mobile menu
├── js/
│   ├── contactFormValidation.js # Contact form validation
│   ├── jobApplyValidation.js    # Job application validation
│   ├── jobPostValidation.js     # Job posting validation
│   ├── loginValidation.js       # Login form validation
│   └── signupValidation.js      # Registration validation
├── sitemap/
│   ├── database/
│   │   └── jobsphere_db.sql     # Database schema and sample data
│   ├── sitemap.svg              # Site structure diagram
│   └── users.pdf                # User documentation
├── uploads/
│   ├── company_logos/           # Uploaded company logos
│   └── resumes/                 # Uploaded resume files
├── about.php                    # About page
├── apply.php                    # Job application form
├── contact.php                  # Contact form
├── delete.php                   # Delete job functionality
├── edit.php                     # Edit job functionality
├── gallery.php                  # Image gallery
├── index.php                    # Homepage
├── inquiries.php                # Admin inquiry management
├── job_application.php          # View applications (employer/admin)
├── job_post.php                 # Post new job
├── jobs.php                     # Job listings page
├── login.php                    # User login
└── signup.php                   # User registration
```

## 💾 Database Schema

### Tables

1. **registration** - User accounts

   - id (Primary Key)
   - name
   - email (Unique)
   - password (Hashed)
   - usertype (job_seeker/employer/admin)

2. **joblistings** - Job postings

   - job_id (Primary Key)
   - company_name
   - company_logo
   - job_level
   - job_type
   - job_title
   - job_description
   - job_salary

3. **applications** - Job applications

   - apply_id (Primary Key)
   - name
   - email
   - phone
   - company_name
   - job_title
   - job_salary
   - resume_path

4. **contact_form** - Contact inquiries
   - contact_id (Primary Key)
   - name
   - email
   - phone
   - source
   - message

## 🔧 Dependencies & Requirements

### System Requirements

- **Operating System**: Windows, Linux, or macOS
- **Web Server**: Apache 2.4+
- **PHP**: 7.4+ with extensions:
  - mysqli
  - session
  - file upload enabled
- **MySQL**: 5.7+ or MariaDB 10.3+
- **Browser**: Modern browser with JavaScript enabled

### PHP Configuration

Ensure these settings in `php.ini`:

```ini
file_uploads = On
upload_max_filesize = 5M
post_max_size = 8M
max_execution_time = 300
session.auto_start = 0
```

## 🤝 Contribution Guidelines

We welcome contributions to JobSphere! Here's how you can help:

### Getting Started

1. Fork the repository
2. Clone your fork locally:
   ```bash
   git clone https://github.com/yourusername/job-sphere-web.git
   ```
3. Create a feature branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```

### Development Process

1. Make your changes following our coding standards:

   - Use consistent indentation (2 spaces)
   - Comment complex logic
   - Follow PSR-12 for PHP code
   - Use semantic HTML5 elements
   - Ensure responsive design compatibility

2. Test your changes:

   - Verify all forms work correctly
   - Test on multiple browsers
   - Check mobile responsiveness
   - Ensure no SQL injection vulnerabilities

3. Commit your changes:

   ```bash
   git add .
   git commit -m "Add: Brief description of your changes"
   ```

4. Push to your fork:

   ```bash
   git push origin feature/your-feature-name
   ```

5. Create a Pull Request with:
   - Clear description of changes
   - Screenshots for UI changes
   - Reference to any related issues

### Code Style Guidelines

- **PHP**: Follow PSR-12 coding standards
- **JavaScript**: Use ES6+ features where appropriate
- **CSS**: Use BEM methodology for class naming
- **SQL**: Use uppercase for keywords

### Reporting Issues

- Use GitHub Issues
- Include steps to reproduce
- Provide error messages and screenshots
- Mention your environment details

## 📄 License

This project is licensed under the MIT License. See below for details:

```
MIT License

Copyright (c) 2024 JobSphere

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

## 🔍 Troubleshooting

### Common Issues

1. **Database Connection Error**

   - Verify MySQL service is running in XAMPP
   - Check credentials in `includes/config.php`
   - Ensure `jobsphere_db` database exists

2. **404 Not Found Error**

   - Confirm project is in `htdocs` folder
   - Check URL: `http://localhost/job-sphere-web`
   - Verify Apache service is running

3. **File Upload Issues**

   - Check `uploads/` directory permissions (755)
   - Verify PHP upload settings in `php.ini`
   - Ensure file size is within limits

4. **Login Problems**

   - Clear browser cookies and cache
   - Verify user exists in database
   - Check password is correct (case-sensitive)

5. **Session Errors**
   - Ensure `session_start()` is called
   - Check PHP session directory is writable
   - Verify no output before session functions

## 🚦 Security Considerations

- All passwords are hashed using bcrypt
- SQL injection prevention using prepared statements
- XSS protection through proper output escaping
- File upload validation and restrictions
- Session security measures implemented

## 🔄 Future Enhancements

- Email notifications for applications
- Advanced search filters
- User profile management
- Resume builder tool
- Interview scheduling system
- Analytics dashboard
- API for mobile applications
- Multi-language support
