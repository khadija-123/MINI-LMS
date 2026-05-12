# MINI-LMS: Learning Management System

A comprehensive enterprise-level Learning Management System (LMS) built with Laravel and PHP. Designed for educational institutions to manage courses, students, instructors, and learning resources.

## 📋 Project Overview

MINI-LMS is a full-featured learning management platform that enables educational institutions to:
- Manage courses and curriculum
- Enroll students in courses
- Assign and grade assignments
- Track student progress
- Facilitate instructor-student communication
- Generate performance reports

## 🎯 Project Objectives

- ✅ Build scalable LMS architecture
- ✅ Implement role-based access control
- ✅ Create intuitive user interfaces
- ✅ Ensure data security and privacy
- ✅ Optimize database queries
- ✅ Provide comprehensive reporting

## 🛠️ Technology Stack

### Backend Framework
```json
{
  "Laravel": "8.x / 9.x",
  "PHP": "7.4 / 8.0+",
  "MySQL": "5.7+",
  "Composer": "Latest"
}
```

### Frontend
```json
{
  "Blade": "Laravel templating",
  "Bootstrap": "5.x",
  "HTML5": "Latest",
  "CSS3": "Latest",
  "JavaScript": "ES6+"
}
```

### Key Packages
```json
{
  "Laravel/Sanctum": "API authentication",
  "Laravel/Passport": "OAuth2 server",
  "Spatie/Permission": "Role-based access",
  "Maatwebsite/Excel": "Excel exports",
  "Laravel/Tinker": "REPL environment"
}
```

### Tools
- PHP 7.4+
- MySQL/MariaDB
- Composer
- Git/GitHub
- Laravel Artisan CLI
- VS Code

## 📁 Project Structure

```
MINI-LMS/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminController.php
│   │   │   ├── InstructorController.php
│   │   │   ├── StudentController.php
│   │   │   ├── CourseController.php
│   │   │   ├── AssignmentController.php
│   │   │   └── GradeController.php
│   │   ├── Middleware/
│   │   │   ├── CheckRole.php
│   │   │   └── Authenticate.php
│   │   └── Requests/
│   │       ├── StoreCourseRequest.php
│   │       └── StoreAssignmentRequest.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Course.php
│   │   ├── Enrollment.php
│   │   ├── Assignment.php
│   │   ├── Grade.php
│   │   └── Submission.php
│   └── Policies/
│       └── CoursePolicy.php
│
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_create_users_table.php
│   │   ├── 2024_01_02_create_courses_table.php
│   │   ├── 2024_01_03_create_enrollments_table.php
│   │   ├── 2024_01_04_create_assignments_table.php
│   │   └── 2024_01_05_create_grades_table.php
│   ├── seeders/
│   │   ├── UserSeeder.php
│   │   ├── CourseSeeder.php
│   │   └── RoleSeeder.php
│   └── factories/
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   ├── sidebar.blade.php
│   │   │   └── navbar.blade.php
│   │   ├── admin/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── users.blade.php
│   │   │   └── courses.blade.php
│   │   ├── instructor/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── courses.blade.php
│   │   │   ├── assignments.blade.php
│   │   │   └── grades.blade.php
│   │   ├── student/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── mycourses.blade.php
│   │   │   ├── assignments.blade.php
│   │   │   └── grades.blade.php
│   │   └── auth/
│   │       ├── login.blade.php
│   │       └── register.blade.php
│   └── css/
│
├── routes/
│   ├── web.php
│   ├── api.php
│   └── channels.php
│
├── config/
│   ├── auth.php
│   ├── database.php
│   └── app.php
│
├── .env
├── .env.example
├── composer.json
└── artisan
```

## 🚀 Getting Started

### Prerequisites
- PHP 7.4+ with extensions (MySQL, XML, JSON)
- MySQL 5.7+
- Composer
- Git
- Node.js & npm (for frontend dependencies)

### Installation

#### 1. Clone Repository
```bash
git clone https://github.com/khadija-123/MINI-LMS.git
cd MINI-LMS
```

#### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install frontend dependencies
npm install
npm run dev
```

#### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Update .env with database credentials
cat > .env << EOF
APP_NAME=MINI-LMS
APP_ENV=local
APP_KEY=base64:... (auto-generated)
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_lms
DB_USERNAME=root
DB_PASSWORD=

MAIL_DRIVER=log
EOF
```

#### 4. Database Setup
```bash
# Create database
mysql -u root -p
> CREATE DATABASE mini_lms;
> EXIT;

# Run migrations
php artisan migrate

# Seed sample data
php artisan db:seed

# Or seed specific seeder
php artisan db:seed --class=UserSeeder
```

#### 5. Start Application
```bash
# Start development server
php artisan serve
# Application opens on http://localhost:8000

# In another terminal, watch frontend changes
npm run watch
```

## 📊 Database Schema

### Users Table
```sql
CREATE TABLE users (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin', 'instructor', 'student') NOT NULL,
  email_verified_at TIMESTAMP NULL,
  remember_token VARCHAR(100),
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

### Courses Table
```sql
CREATE TABLE courses (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  instructor_id BIGINT UNSIGNED NOT NULL,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  code VARCHAR(50) UNIQUE NOT NULL,
  credits INT,
  capacity INT DEFAULT 50,
  start_date DATE,
  end_date DATE,
  status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (instructor_id) REFERENCES users(id)
);
```

### Enrollments Table
```sql
CREATE TABLE enrollments (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  student_id BIGINT UNSIGNED NOT NULL,
  course_id BIGINT UNSIGNED NOT NULL,
  enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status ENUM('active', 'completed', 'dropped') DEFAULT 'active',
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (student_id) REFERENCES users(id),
  FOREIGN KEY (course_id) REFERENCES courses(id),
  UNIQUE KEY unique_enrollment (student_id, course_id)
);
```

### Assignments Table
```sql
CREATE TABLE assignments (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  course_id BIGINT UNSIGNED NOT NULL,
  instructor_id BIGINT UNSIGNED NOT NULL,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  due_date DATETIME NOT NULL,
  total_points INT DEFAULT 100,
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (course_id) REFERENCES courses(id),
  FOREIGN KEY (instructor_id) REFERENCES users(id)
);
```

### Grades Table
```sql
CREATE TABLE grades (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  assignment_id BIGINT UNSIGNED NOT NULL,
  student_id BIGINT UNSIGNED NOT NULL,
  score DECIMAL(5,2),
  feedback TEXT,
  submitted_at TIMESTAMP,
  graded_at TIMESTAMP,
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (assignment_id) REFERENCES assignments(id),
  FOREIGN KEY (student_id) REFERENCES users(id)
);
```

## 🔌 Key Features

### Admin Dashboard
- User management (create, edit, delete users)
- Course management
- System statistics
- Report generation
- Role management

### Instructor Features
- Create and manage courses
- Create assignments
- Grade student submissions
- View student progress
- Generate class reports
- Manage enrollment

### Student Features
- View enrolled courses
- Submit assignments
- View grades
- Track progress
- Download course materials
- View gradebook

## 🔐 Security Features

### Authentication
```php
// Using Laravel's built-in authentication
Auth::guard('web')->attempt($credentials);

// Middleware protection
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index');
});
```

### Role-Based Access Control (RBAC)
```php
// Spatie/Permission package
use Spatie\Permission\Traits\HasRoles;

class User extends Model {
    use HasRoles;
}

// Middleware for role checking
Route::middleware(['role:admin'])->group(function () {
    Route::get('/users', 'UserController@index');
});
```

### Password Hashing
```php
// Laravel automatically hashes passwords
Hash::make($password);
Hash::check($password, $hash);
```

### CSRF Protection
```html
<!-- Included in all forms -->
@csrf
```

### SQL Injection Prevention
```php
// Using Eloquent ORM
User::where('email', $email)->first(); // Safe - parameterized
```

## 🎯 User Roles & Permissions

### Admin
- ✅ Manage all users
- ✅ Create/edit/delete courses
- ✅ Manage system settings
- ✅ Generate reports
- ✅ Manage roles and permissions

### Instructor
- ✅ Create and manage own courses
- ✅ Create assignments
- ✅ Grade submissions
- ✅ View student progress
- ✅ Manage course materials

### Student
- ✅ View enrolled courses
- ✅ Submit assignments
- ✅ View grades
- ✅ Download materials
- ✅ View gradebook

## 📝 API Endpoints (If REST API enabled)

### Authentication
```
POST   /api/auth/login
POST   /api/auth/register
POST   /api/auth/logout
GET    /api/auth/profile
```

### Courses
```
GET    /api/courses
POST   /api/courses (instructor)
GET    /api/courses/{id}
PUT    /api/courses/{id} (instructor)
DELETE /api/courses/{id} (instructor)
```

### Enrollments
```
POST   /api/enrollments
GET    /api/enrollments/{student_id}
DELETE /api/enrollments/{id}
```

### Assignments
```
GET    /api/courses/{course_id}/assignments
POST   /api/courses/{course_id}/assignments (instructor)
GET    /api/assignments/{id}
PUT    /api/assignments/{id} (instructor)
```

### Grades
```
GET    /api/assignments/{assignment_id}/grades
POST   /api/grades (instructor)
PUT    /api/grades/{id} (instructor)
GET    /api/students/{student_id}/grades
```

## 🧪 Testing

### Create Test Data
```bash
# Run seeders
php artisan db:seed

# Or create specific test user
php artisan tinker
> User::factory()->count(10)->create();
```

### Run Tests
```bash
# Run all tests
php artisan test

# Run specific test
php artisan test tests/Feature/CourseTest.php
```

## 📈 Performance Optimization

### Database Optimization
```php
// Use eager loading to avoid N+1 queries
$courses = Course::with('instructor', 'enrollments')->get();

// Create indexes on frequently queried columns
Schema::table('courses', function (Blueprint $table) {
    $table->index('instructor_id');
    $table->index('status');
});
```

### Query Optimization
```php
// Use select() to fetch only needed columns
User::select('id', 'name', 'email')->get();

// Use pagination
User::paginate(15);
```

### Caching
```php
// Cache query results
$courses = Cache::remember('courses', 60, function () {
    return Course::all();
});
```

## 🚀 Deployment

### Environment Setup
```bash
# Update .env for production
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_HOST=your_db_host
DB_PASSWORD=strong_password

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
```

### Deploy to Server
```bash
# SSH into server
ssh user@server.com

# Clone repository
git clone https://github.com/khadija-123/MINI-LMS.git

# Install dependencies
composer install --no-dev

# Run migrations
php artisan migrate --force

# Set permissions
chmod -R 775 storage bootstrap/cache
```

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [PHP Manual](https://www.php.net/manual)
- [MySQL Documentation](https://dev.mysql.com/doc)
- [Bootstrap Documentation](https://getbootstrap.com/docs)
- [Spatie/Permission](https://spatie.be/docs/laravel-permission/v5/introduction)

## 🎯 Future Enhancements

- [ ] Mobile app (React Native)
- [ ] Video hosting integration
- [ ] Real-time notifications
- [ ] Discussion forums
- [ ] Advanced reporting
- [ ] Third-party LMS integration
- [ ] Payment gateway integration
- [ ] Certificate generation

## 📝 License

MIT License

## 👨‍💻 Author

**Khadija Liaquat**
- GitHub: [@khadija-123](https://github.com/khadija-123)
- LinkedIn: [Khadija Liaquat](https://www.linkedin.com/in/khadija-liaquat-5b32b627a)
- Email: khadija980liaquatali@gmail.com

## 📞 Support

For questions or issues:
- Create an issue on GitHub
- Check Laravel documentation
- Contact via email

---

**Status**: ✅ Complete
**Version**: 1.0.0
**Last Updated**: May 2026
**Course**: Backend Web Development with Laravel
