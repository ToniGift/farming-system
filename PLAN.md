# Farming System (Greenin) — Application Plan

Complete documentation of the application architecture, modules, features, and flows.

---

## 1. Overview

**Farming System (Greenin)** is a PHP-based web application for managing farm operations. It has three main areas:

| Area | Purpose |
|------|---------|
| **Public Site** | Landing page, farmer login, farmer registration |
| **Farmer Dashboard** | CRUD for products, sales, equipment, bought goods |
| **Admin Panel** | Oversight of farmers, products, sales; disease management |

---

## 2. Technology Stack

| Layer | Technologies |
|-------|--------------|
| **Backend** | PHP 8.1+, PDO for MySQL |
| **Database** | MySQL / MariaDB 10.4+ |
| **Frontend** | HTML5, CSS3, JavaScript, Bootstrap 4 |
| **Libraries** | jQuery, DataTables, ApexCharts, Owl Carousel, Select2, Summernote, FullCalendar |
| **Server** | Apache (XAMPP) |

---

## 3. Application Architecture

```
┌─────────────────────────────────────────────────────────────────────────┐
│                         FARMING SYSTEM (GREENIN)                         │
└─────────────────────────────────────────────────────────────────────────┘

    ┌──────────────┐     ┌──────────────┐     ┌──────────────┐
    │   PUBLIC     │     │   FARMER     │     │    ADMIN     │
    │   SITE       │     │   DASHBOARD  │     │    PANEL     │
    └──────┬───────┘     └──────┬───────┘     └──────┬───────┘
           │                    │                    │
           └────────────────────┴────────────────────┘
                                │
                                ▼
                    ┌───────────────────────┐
                    │   CORE LAYER          │
                    │   DB + Domain Classes │
                    └───────────────────────┘
```

---

## 4. Module Plans

### 4.1 Public Site

| File | Purpose |
|------|---------|
| `index.php` | Landing page (slider, about Greenin, services) |
| `login.php` | Farmer login form |
| `register.php` | Farmer registration form |
| `navbar.php` | Shared navigation |
| `header.php` | Shared head/scripts |
| `footer.php` | Shared footer |

**User flow:** Visitor → Landing → Login/Register → Farmer Dashboard

---

### 4.2 Farmer Module

**Base path:** `farmer/`

**Session:** `$_SESSION['farmer']` (id, username, fullname, email, address)

#### Dashboard
- **File:** `farmer/dashboard.php`
- **Shows:** Counts for Products, Sales, Equipments, Bought Items
- **Charts:** ApexCharts for visual stats

#### Products
| Page | File | Action |
|------|------|--------|
| List | `products_list.php` | View all farmer products |
| Add | `add_product.php` | Add new product |
| Edit | `edit_product.php` | Edit product |
| Delete | `delete_product.php` | Delete product |

**AJAX handlers** (`farmer/php/`): `add_product.php`, `update_product.php`, `get_product_price.php`

#### Sales Records
| Page | File | Action |
|------|------|--------|
| List | `sales_records.php` | View all sales |
| Add | `add_sales_record.php` | Add sale record |
| Edit | `edit_sale.php` | Edit sale |
| Delete | `delete_sale.php` | Delete sale |

**AJAX handlers:** `add_sales.php`, `update_sales.php`

#### Equipments
| Page | File | Action |
|------|------|--------|
| List | `equipments.php` | View all equipment |
| Add | `add_equipment.php` | Add equipment |
| Edit | `edit_equipment.php` | Edit equipment |
| Delete | `delete_equipment.php` | Delete equipment |

**AJAX handlers:** `add_equipment.php`, `update_equipment.php`

#### Bought Items
| Page | File | Action |
|------|------|--------|
| List | `bought_items.php` | View bought goods |
| Add | `add_bought_item.php` | Add bought item |
| Edit | `edit_bought_item.php` | Edit bought item |
| Delete | `delete_bought_item.php` | Delete bought item |

**AJAX handlers:** `add_bought_item.php`, `update_bought_item.php`

#### Other
- `logout.php` — End farmer session
- `empty.php` — Empty/placeholder page

---

### 4.3 Admin Module

**Base path:** `admin/`

**Session:** `$_SESSION['farmer_admin']`

#### Dashboard
- **File:** `admin/dashboard.php`
- **Shows:** Total farmers, products, sales counts
- **Charts:** ApexCharts

#### Farmers
| Page | File | Action |
|------|------|--------|
| List | `farmers.php` | List all farmers |
| Detail | `farmer.php?id=X` | View farmer details and sales |

#### AJAX Handlers (`admin/ajax/`)
| Handler | Purpose |
|---------|---------|
| `login.php` | Admin login |
| `register.php` | (if used) |
| `add_disease.php` | Add disease (name, symptoms, causes, prevention, cure, comments) |
| `delete_disease.php` | Delete disease |
| `add_department.php` | Add department |
| `add_post.php` | Add post (title, content, cover_image) |

**Note:** Departments and Posts have AJAX handlers but may not have full UI pages. Disease management references `core/diseases.class.php`.

#### Other
- `index.php` — Admin login page
- `logout.php` — End admin session

---

## 5. Core Layer

**Path:** `core/`

| File | Purpose |
|------|---------|
| `db.class.php` | PDO database wrapper (prep, execute, fetch, fetchAll, num_row) |
| `farmers.class.php` | Farmer CRUD, login, registration |
| `products.class.php` | Product CRUD per farmer |
| `sales.class.php` | Sales CRUD, fetch by farmer |
| `equipments.class.php` | Equipment CRUD per farmer |
| `bought_goods.class.php` | Bought goods CRUD per farmer |
| `admin.class.php` | Admin login, counts |
| `farms.class.php` | Farm operations (underused) |
| `orders.class.php` | Orders (underused) |
| `core.function.php` | Shared utility functions |
| `session.class.php` | Session handling |

---

## 6. Database Schema

| Table | Purpose |
|-------|---------|
| `admins` | Admin users (id, username, password) |
| `farmers` | Farmer users (id, fullname, username, email, password, address) |
| `products` | Products per farmer (id, farmer_id, product_name, price, description, status) |
| `sales` | Sales records (id, product_id, quantity, total_amount, time_sold) |
| `equipments` | Equipment per farmer (id, farmer_id, equipment, quantity, status) |
| `bought_goods` | Purchased items (id, farmer_id, good_name, price, quantity, time_added) |
| `farms` | Farm info (id, farmer_id, farm_name, description, address) — underused |

**Schema file:** `farming_system.sql`

---

## 7. URL Routing

**File:** `.htaccess`

- Removes trailing slashes
- Extension-less URLs: `/admin/dashboard` → `dashboard.php`

### Key URLs

| Path | File | Description |
|------|------|-------------|
| `/` | `index.php` | Landing page |
| `/login` | `login.php` | Farmer login |
| `/register` | `register.php` | Farmer registration |
| `/farmer/dashboard` | `farmer/dashboard.php` | Farmer dashboard |
| `/farmer/products_list` | `farmer/products_list.php` | Products list |
| `/farmer/add_product` | `farmer/add_product.php` | Add product |
| `/farmer/sales_records` | `farmer/sales_records.php` | Sales list |
| `/farmer/add_sales_record` | `farmer/add_sales_record.php` | Add sale |
| `/farmer/equipments` | `farmer/equipments.php` | Equipments list |
| `/farmer/add_equipment` | `farmer/add_equipment.php` | Add equipment |
| `/farmer/bought_items` | `farmer/bought_items.php` | Bought items list |
| `/farmer/add_bought_item` | `farmer/add_bought_item.php` | Add bought item |
| `/admin/` | `admin/index.php` | Admin login |
| `/admin/dashboard` | `admin/dashboard.php` | Admin dashboard |
| `/admin/farmers` | `admin/farmers.php` | Farmers list |
| `/admin/farmer?id=X` | `admin/farmer.php` | Farmer detail & sales |

---

## 8. User Flows

### Visitor Flow
1. Land on homepage (`/`)
2. Browse slider, about, services
3. Click Login or Register
4. Login → Farmer Dashboard
5. Register → Account created → Login → Farmer Dashboard

### Farmer Flow
1. Login at `/login`
2. Redirect to `/farmer/dashboard`
3. From dashboard: Products, Sales, Equipments, Bought Items
4. Each section: List → Add / Edit / Delete
5. Logout → Back to public site

### Admin Flow
1. Login at `/admin`
2. Redirect to `/admin/dashboard`
3. View farmers count, products count, sales count
4. Navigate to Farmers list
5. Click farmer → View farmer detail and sales
6. (Disease/Department/Post features if UI exists)
7. Logout → Back to admin login

---

## 9. Authentication

| Role | Session Key | Login Page |
|------|-------------|------------|
| Farmer | `$_SESSION['farmer']` | `/login` |
| Admin | `$_SESSION['farmer_admin']` | `/admin` |

**Default credentials:**
- Admin: `admin` / `admin`
- Farmer: Register or use seed data

**Password:** MD5 (consider bcrypt/argon2 for production)

---

## 10. Project Structure (File Tree)

```
farming_system/
├── index.php              # Landing page
├── login.php              # Farmer login
├── register.php           # Farmer registration
├── header.php
├── navbar.php
├── footer.php
├── .htaccess
├── farming_system.sql     # Database schema
├── PLAN.md                # This file
├── README.md
│
├── core/
│   ├── db.class.php
│   ├── farmers.class.php
│   ├── products.class.php
│   ├── sales.class.php
│   ├── equipments.class.php
│   ├── bought_goods.class.php
│   ├── admin.class.php
│   ├── farms.class.php
│   ├── orders.class.php
│   ├── session.class.php
│   └── core.function.php
│
├── farmer/
│   ├── dashboard.php
│   ├── products_list.php, add_product.php, edit_product.php, delete_product.php
│   ├── sales_records.php, add_sales_record.php, edit_sale.php, delete_sale.php
│   ├── equipments.php, add_equipment.php, edit_equipment.php, delete_equipment.php
│   ├── bought_items.php, add_bought_item.php, edit_bought_item.php, delete_bought_item.php
│   ├── logout.php
│   ├── components/        # header, sidebar, footer, head, scripts
│   └── php/               # AJAX handlers
│       ├── login.php, register.php
│       ├── add_product.php, update_product.php, get_product_price.php
│       ├── add_sales.php, update_sales.php
│       ├── add_equipment.php, update_equipment.php
│       └── add_bought_item.php, update_bought_item.php
│
├── admin/
│   ├── index.php          # Admin login
│   ├── dashboard.php
│   ├── farmers.php
│   ├── farmer.php         # Farmer detail
│   ├── logout.php
│   ├── components/        # header, sidebar, footer, head
│   └── ajax/
│       ├── login.php
│       ├── add_disease.php, delete_disease.php
│       ├── add_department.php
│       └── add_post.php
│
└── Tony/                  # Screenshots
```

---

## 11. Security Notes

- Passwords use MD5 — consider bcrypt/argon2 for production
- DB credentials in `core/db.class.php` — consider `.env` for production
- No CSRF tokens on forms
- Session-based auth; protected pages check `$_SESSION['farmer']` or `$_SESSION['farmer_admin']`

---

## 12. Future / Underused Features

| Feature | Status |
|---------|--------|
| `farms` table & class | Schema exists, underused in main flows |
| `orders` class | Exists, underused |
| Departments | AJAX handler exists, UI commented out in sidebar |
| Posts | AJAX handler exists, UI not visible |
| Diseases | AJAX handlers exist, requires `diseases.class.php` and `diseases` table |
