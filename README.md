# TicketFlow - Twig + PHP Implementation

A modern, full-featured ticket management web application built with Twig templating engine and PHP.

![PHP](https://img.shields.io/badge/PHP-8.4+-blue.svg)
![Twig](https://img.shields.io/badge/Twig-3.0+-green.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)

## 🎯 Features

- **Beautiful Landing Page** with wavy SVG background and decorative circles
- **Responsive Hamburger Navigation** for mobile devices
- **Secure Authentication** with PHP Sessions and Login/Signup
- **Protected Routes** - Dashboard and Ticket pages require authentication
- **Dashboard** with real-time statistics (Total, Open, In Progress, Closed tickets)
- **Full CRUD Operations** for tickets:
  - ✅ Create new tickets
  - ✅ View all tickets in card layout
  - ✅ Edit existing tickets
  - ✅ Delete tickets with confirmation
- **Twig Templates** - Clean separation of logic and presentation
- **Form Validation** with inline error messages
- **Responsive Design** - works on mobile, tablet, and desktop
- **Status Management** - Open, In Progress, Closed with color coding
- **Priority Levels** - Low, Medium, High
- **LocalStorage Persistence** - ticket data persists in browser
- **PHP Session Management** - secure server-side authentication

## 🛠️ Technologies Used

- **PHP** 8.4+
- **Twig** 3.x - Templating Engine
- **Composer** - Dependency Management
- **CSS3** with CSS Variables - for styling and theming
- **JavaScript (Vanilla)** - for client-side interactivity
- **LocalStorage API** - for ticket data persistence
- **PHP Sessions** - for authentication management

## 📦 Installation & Setup

### Prerequisites
- PHP 8.0 or higher
- Composer
- A web browser

### Steps

1. **Navigate to the project directory**
```bash
   cd ticket-app-twig-php-jaycarlx
```

2. **Install Composer dependencies**
```bash
   composer install
```

3. **Start the PHP built-in server**
```bash
   cd public
   php -S localhost:8000
```

4. **Open your browser**
   - Navigate to `http://localhost:8000`

## 🎮 Usage Guide

### 1. Landing Page
- Visit `http://localhost:8000`
- Explore the features
- Click "Login" or "Get Started" to begin

### 2. Create an Account
- Click "Get Started" or "Sign Up"
- Enter your email and password (minimum 6 characters)
- Password confirmation required
- Click "Create Account"
- Success message displays for 2 seconds
- Automatically redirected to Dashboard
- **PHP Session created on server**

### 3. Login
- Enter your credentials
- Click "Login"
- Success message displays for 2 seconds
- Redirected to Dashboard on success
- **PHP Session validates credentials**

### 4. Dashboard
- View ticket statistics at a glance
- See total, open, in-progress, and closed ticket counts
- Statistics calculated from localStorage
- Click "Manage Tickets" to access ticket management
- Click "Log Out" to destroy PHP session

### 5. Manage Tickets
- **Create:** Click "+ New Ticket" button
  - Enter title (required)
  - Select status: open, in_progress, or closed (required)
  - Select priority: low, medium, or high (optional)
  - Add description (optional)
  - Click "Create Ticket"
  - Data saved to localStorage
  
- **View:** All tickets displayed as cards with status badges

- **Edit:** Click "✏️ Edit" button on any ticket
  - Form auto-populates with ticket data
  - Modify ticket details
  - Click "Update Ticket"
  - localStorage updated

- **Delete:** Click "🗑️ Delete" button
  - Confirmation dialog appears
  - Confirm to permanently delete from localStorage

### 6. Logout
- Click "Log Out" button in navigation
- PHP session destroyed on server
- Returned to landing page
- To test login/signup again, you must logout first

## 🔐 Test Credentials

You can use any email and password combination (minimum 6 characters).

**Example:**
- Email: `twig@ticketflow.com`
- Password: `twig12345`

**Or:**
- Email: `php@example.com`
- Password: `password123`

## 📁 Project Structure
```
ticket-app-twig-php-jaycarlx/
├── public/                  # Web root (publicly accessible)
│   ├── index.php            # Landing page controller
│   ├── login.php            # Login page controller
│   ├── signup.php           # Signup page controller
│   ├── process_login.php    # Login form handler
│   ├── process_signup.php   # Signup form handler
│   ├── dashboard.php        # Dashboard controller
│   ├── tickets.php          # Tickets page controller
│   ├── logout.php           # Logout handler
│   └── css/                 # CSS files with variables
│       ├── main.css
│       ├── landing.css
│       ├── auth.css
│       ├── dashboard.css
│       └── tickets.css
├── templates/               # Twig template files
│   ├── base.twig            # Base template (extended by all)
│   ├── landing.twig
│   ├── login.twig
│   ├── signup.twig
│   ├── dashboard.twig
│   └── tickets.twig
├── src/                     # PHP classes
│   └── Auth.php             # Authentication class
├── vendor/                  # Composer dependencies (Twig)
├── composer.json
└── README.md
```

## 🎨 Design Specifications

### Layout
- **Max Width:** 1440px (centered on larger screens)
- **Hero Section:** Wavy SVG background at bottom edge
- **Decorative Elements:** 3 circular elements throughout
- **Cards:** Box-shaped sections with shadows and rounded corners

### Color Scheme (CSS Variables)
- **Primary:** `#6366f1` (Indigo)
- **Primary Hover:** `#4f46e5`
- **Hero Gradient:** `#667eea` to `#764ba2`
- **Open Status:** Green (`#10b981`)
- **In Progress Status:** Amber (`#f59e0b`)
- **Closed Status:** Gray (`#6b7280`)

### Responsive Breakpoints
- **Mobile:** < 768px (stacked layout)
- **Tablet:** 768px - 900px
- **Desktop:** > 900px

## 🔒 Security Features

- **PHP Sessions:** Server-side session management with `$_SESSION`
- **Protected Routes:** Dashboard and Tickets check authentication before rendering
- **Session Key:** Uses `ticketapp_session` and `ticketapp_user` in PHP session
- **Auto-redirect:** Unauthenticated users redirected to login via `Auth::requireAuth()`
- **Logout:** Destroys PHP session with `session_destroy()`
- **Password Validation:** Minimum 6 characters enforced server-side

## 🏗️ Architecture

### Twig Templating
- **Base Template:** `base.twig` provides HTML structure
- **Template Inheritance:** All pages extend `base.twig`
- **Blocks:** `title`, `stylesheets`, `body`, `javascripts`
- **Clean Separation:** Logic in PHP, presentation in Twig

### PHP Classes
- **Auth Class:** Handles all authentication logic
  - `isAuthenticated()` - Check if user is logged in
  - `login($email, $password)` - Validate and create session
  - `signup($email, $password, $confirmPassword)` - Create account
  - `logout()` - Destroy session
  - `getCurrentUser()` - Get logged-in user data
  - `requireAuth()` - Protect routes (redirect if not authenticated)

### Data Flow
1. **User Action** → PHP Controller (`index.php`, `login.php`, etc.)
2. **PHP Processing** → Auth validation, data handling
3. **Twig Rendering** → Template renders with data
4. **Client-Side JS** → Ticket CRUD operations (localStorage)
5. **PHP Sessions** → Maintain authentication state

## ✅ Form Validation Rules

### Tickets (JavaScript + LocalStorage)
- **Title:** Required, minimum 1 character
- **Status:** Required, must be `open`, `in_progress`, or `closed`
- **Priority:** Optional, defaults to `medium`
- **Description:** Optional

### Authentication (PHP Server-Side)
- **Email:** Required, basic validation
- **Password:** Required, minimum 6 characters
- **Confirm Password (Signup):** Required, must match password

## 🐛 Known Issues

- Ticket data stored in localStorage (client-side only)
- No database integration for tickets
- Sessions stored in default PHP session handler
- No email verification
- No password recovery
- No password hashing (simulated auth only)

## 🚀 Future Enhancements

- **Database Integration:** MySQL/PostgreSQL for ticket storage
- **User Management:** Multiple users with separate ticket lists
- **Password Hashing:** Use `password_hash()` and `password_verify()`
- **CSRF Protection:** Add token validation for forms
- **API Endpoints:** RESTful API for ticket operations
- **Real-time Updates:** WebSocket integration
- **File Uploads:** Attach files to tickets
- **Email Notifications:** PHPMailer integration
- **Search & Filter:** Advanced ticket filtering
- **Export:** PDF/CSV export functionality

## 📝 Notes

- **Tickets:** Stored in browser localStorage (frontend)
- **Authentication:** Managed via PHP sessions (backend)
- **Hybrid Approach:** Combines server-side auth with client-side data
- **Development Server:** Uses PHP's built-in server (not for production)
- **Production:** Deploy with Apache/Nginx + PHP-FPM

## 🎨 CSS Variables for Theming

All colors are defined as CSS variables in `:root` selector:
```css
:root {
  --color-primary: #6366f1;
  --color-primary-600: #4f46e5;
  --color-hero-start: #667eea;
  --color-hero-end: #764ba2;
  /* ... and more */
}
```

## 🔧 Troubleshooting

### "Twig not found" error
```bash
composer install
```

### "Session already started" warning
Clear browser cookies or use incognito mode

### CSS not loading
Ensure you're in the `public/` directory when starting the server

### Port already in use
```bash
php -S localhost:8001  # Use different port
```

## 🌐 Deployment (Production)

For production deployment:

1. **Use a real web server** (Apache/Nginx)
2. **Set up virtual host** pointing to `public/` directory
3. **Enable PHP-FPM**
4. **Configure `.htaccess`** (Apache) or `nginx.conf`
5. **Set proper permissions** on `vendor/` and session directories
6. **Use environment variables** for configuration
7. **Enable HTTPS** with SSL certificate

## 👨‍💻 Developer

Built by **Jaycarlx** as part of Frontend Stage 2 Multi-Framework Task

## 📄 License

MIT License - feel free to use this project for learning and development.

---

**Happy Ticket Managing with Twig & PHP! ✨**