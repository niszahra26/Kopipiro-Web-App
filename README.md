# KOPIPIRO Web-App with API & Plain PHP

| Name | Student ID | Class |
|---|---|---|
| Nisrina Zahralilla | 5025251013 | IUP |

Web Programming Course - Institut Teknologi Sepuluh Nopember

## Web Folder Structure

To complete this assignment, I referred to the API Module provided in class, with some adjustments to fix several errors and problems. I also implemented the same database structure and added some parts to fulfill the Extension Exercises.

```text
kopipiro/
├── api/
│   ├── auth.php
│   ├── export.php
│   ├── midtrans_notify.php
│   ├── orders.php
│   ├── pay.php
│   ├── products.php
│   ├── reviews.php
│   └── sales.php
├── tools/
│   ├── seed_base.php       -> for registering the admin user
│   └── seed_from_api.php   -> to copy data from a public API to the database
├── config.php              -> local only, not uploaded
├── config.example.php      -> uploaded to GitHub
├── .gitignore              -> uploaded to GitHub
├── customer.html
├── dashboard.html
├── helpers.php
├── shop.html
└── README.md
```

## Project's Description

Kopipiro is a web application that provides product management, customer ordering, order tracking, and payment processing to help cafe owners manage their business. There are three types of users in this application: customers, cashiers, and cafe owners.

The application uses `config.php` for database configuration (with the help of XAMPP) and payment gateway configuration using Midtrans Sandbox. For security reasons, the actual `config.php` file is excluded from this repository. Use `config.example.php` as a template and provide your own credentials.

> **Notes:** This project was developed for an academic assignment. Payment transactions should be tested using Sandbox credentials, not real payment credentials. External services such as the Indonesian regions API and Open-Meteo also require an internet connection.

## Tasks Implementation

### A. Add a Review Feature

I created a new file called `reviews.php` inside the `api/` folder to handle the review feature. This API handles submitting and retrieving product reviews from the database. On the frontend, I added a review section to `shop.html` where customers can give ratings and write comments about products. The submitted reviews are then displayed along with the product information.

### B. Add Customer Order History Page

I created a new page called `customer.html` to display the customer's order history. I also added the necessary API handling in `orders.php` to retrieve orders based on the logged-in customer's account. The page displays order details, total price, and payment status.

### C. Owner Accessibility to Edit Product's Price from the Dashboard Page

I modified `dashboard.html` to allow the owner to edit product prices directly from the dashboard. I also adjusted `products.php` to handle price updates through the API. This way, the owner does not need to access the database manually just to change a product's price.

### D. Add Delivery Address Dropdown on Checkout Form

I modified the checkout form in `shop.html` by adding dropdown selections for province, city, and district. The dropdown options are retrieved from an Indonesian regions API. I also modified the database structure to store the selected delivery address in the `orders` table, so the information can be saved along with each order.

### E. Show Drink Suggestions to Customers Based on Their City's Temperature

I added a weather-based suggestion feature using the Open-Meteo API. The application retrieves weather information based on the customer's selected city. If the temperature is above 30°C, a suggestion banner appears on the page to recommend suitable drinks.

### F. Add Another API (e.g., Xendit or DOKU) and Compare Both

I attempted to implement another payment gateway as an alternative to Midtrans. I created separate payment-related files to keep the existing Midtrans implementation and the alternative gateway implementation separate. However, I encountered some limitations during the process.

Xendit's registration form required an actual business entity, which I could not provide for this academic project. I then tried DOKU, but according to its official documentation, DOKU does not support Ngrok URLs for its notification webhook.

Due to these limitations, I was unable to complete the alternative payment gateway integration. Therefore, this project continues to use Midtrans Sandbox as its payment gateway.