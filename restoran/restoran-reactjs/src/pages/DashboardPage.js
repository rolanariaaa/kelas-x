import React, { useEffect, useState } from 'react';
import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: { 'Content-Type': 'application/json' },
});

function Dashboard() {
  const [summary, setSummary] = useState({
    users: 0,
    categories: 0,
    menus: 0,
    customers: 0,
  });

  useEffect(() => {
    const fetchSummary = async () => {
      const users = await api.get('/users');
      const categories = await api.get('/categories');
      const menus = await api.get('/menu');
      const customers = await api.get('/customers');
      setSummary({
        users: users.data.length,
        categories: categories.data.length,
        menus: menus.data.length,
        customers: customers.data.length,
      });
    };
    fetchSummary();
  }, []);

  return (
    <div>
      <h2>Dashboard</h2>
      <ul>
        <li>Total Users: {summary.users}</li>
        <li>Total Categories: {summary.categories}</li>
        <li>Total Menu: {summary.menus}</li>
        <li>Total Customers: {summary.customers}</li>
      </ul>
    </div>
  );
}

const DashboardPage = () => {
    return (
        <div>
            <h1>Dashboard</h1>
            <Dashboard />
        </div>
    );
};

export default DashboardPage;