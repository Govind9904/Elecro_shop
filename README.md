### Elecro-Shop

This project converts the **Electro** electronics HTML template into a dynamic Laravel application with an Admin Panel built on AdminLTE.

## Project Overview

The goal is to turn the static theme into a full Laravel + MySQL web app with:

1. Dynamic frontend pages
2. Admin panel for content management
3. Cart and order system
4. SEO-friendly product URLs
5. Clean database design with proper normalization

## Frontend Theme

Electro Template  

## Admin Panel Theme

AdminLTE  
https://adminlte.io/

## Tech Stack

1. Laravel
2. MySQL
3. Blade Templates
4. Bootstrap
5. AdminLTE

## Features Implemented

### Module 1 — Homepage Slider
1. Admin can add, edit, delete sliders
2. Upload slider images
3. Add title, subtitle, and button link
4. Enable or disable sliders
5. Frontend displays sliders dynamically

### Module 2 — Category Management
1. Add category
2. Edit category
3. Delete category
4. Upload category image
5. Display categories on frontend

### Module 3 — Subcategory Management
1. Add subcategory
2. Assign category
3. Edit subcategory
4. Delete subcategory
5. Filter products by category

### Module 4 — Product Management
1. Add product
2. Assign category and subcategory
3. Upload product image
4. Product name, description, price
6. Product detail page

### Module 5 — Cart System (No Login)
1. Add to cart
3. Remove items
4. View cart total
5. Session-based cart

### Module 6 — Order Placement
1. Checkout form collects name, phone, email, address
2. Order stored in database with items

### Module 7 — Order Management (Admin)
1. View all orders
2. View order details
3. See ordered products
4. Update status: Pending, Processing, Completed, Cancelled

### Module 8 — Invoice System 
1. Order invoice page
2. Print invoice
3. PDF invoice generation
4. Invoice includes order ID, customer info, items, total

### Module 9 — Contact Page Management
1. Admin can manage address, phone, email, Google Map embed
2. Contact page is dynamic

### Module 10 — Admin Panel
1. Dashboard
2. Sliders
3. Categories
4. Subcategories
5. Products
6. Orders
7. Settings

### Module 11 — Admin Authentication
1. Admin login and logout

### Module 12 — Role Management
1. Roles: Admin, Manager, Editor
2. Permissions enforced


## Setup Instructions

1. Clone the repo
3. Update database credentials
4. Run migrations and seeders
5. Start the Laravel server

## Login Credentials
1.Admin 
  Email-admin@example.com
  Password-password123
  
2.Manager
  Email-manager@example.com
  Password-manager123

3.Editor
  Email-editor@example.com
  Password-editor123
