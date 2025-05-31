# Restoran Admin

This is the admin panel for the Restoran application, built using React. The admin panel provides a user-friendly interface for managing various aspects of the restaurant, including the dashboard, menu items, categories, customers, and admin users.

## Project Structure

The project is organized as follows:

```
restoran-admin
├── public
│   ├── index.html        # Main HTML file for the React application
│   └── manifest.json     # Metadata for Progressive Web App features
├── src
│   ├── api
│   │   └── index.js      # API functions for CRUD operations
│   ├── components
│   │   ├── Dashboard.js   # Dashboard component
│   │   ├── Menu.js       # Menu component
│   │   ├── Categories.js  # Categories component
│   │   ├── Customers.js   # Customers component
│   │   └── AdminUsers.js  # Admin Users component
│   ├── pages
│   │   ├── DashboardPage.js   # Page for the dashboard
│   │   ├── MenuPage.js         # Page for the menu
│   │   ├── CategoriesPage.js    # Page for categories
│   │   ├── CustomersPage.js     # Page for customers
│   │   └── AdminUsersPage.js    # Page for admin users
│   ├── App.js                # Main application component
│   ├── index.js              # Entry point for the React application
│   └── routes.js             # Application routes
├── package.json              # npm configuration file
└── README.md                 # Project documentation
```

## Features

- **Dashboard**: View key statistics and insights about the restaurant's performance.
- **Menu Management**: Create, update, and delete menu items.
- **Category Management**: Manage categories for menu items.
- **Customer Management**: View and manage customer records.
- **Admin User Management**: Manage admin users with CRUD operations.

## Setup Instructions

1. Clone the repository:
   ```
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```
   cd restoran-admin
   ```

3. Install the dependencies:
   ```
   npm install
   ```

4. Start the development server:
   ```
   npm start
   ```

5. Open your browser and go to `http://localhost:3000` to view the application.

## Usage

Once the application is running, you can navigate through the different sections using the provided links in the navigation menu. Each section allows you to perform CRUD operations as needed.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.