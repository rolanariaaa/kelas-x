import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import DashboardPage from './pages/DashboardPage';
import MenuPage from './pages/MenuPage';
import CategoriesPage from './pages/CategoriesPage';
import CustomersPage from './pages/CustomersPage';
import AdminUsersPage from './pages/AdminUsersPage';

const Routes = () => {
    return (
        <Router>
            <Switch>
                <Route path="/dashboard" component={DashboardPage} />
                <Route path="/menu" component={MenuPage} />
                <Route path="/categories" component={CategoriesPage} />
                <Route path="/customers" component={CustomersPage} />
                <Route path="/admin-users" component={AdminUsersPage} />
            </Switch>
        </Router>
    );
};

export default Routes;