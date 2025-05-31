import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
    // Tambahkan Authorization jika pakai token
  },
});

// Dashboard API
// (Pastikan endpoint dashboard ada di backend, jika tidak, hapus bagian ini)
export const getDashboardData = async () => {
    // const response = await api.get(`/dashboard`);
    // return response.data;
    // Sementara return kosong jika endpoint tidak ada
    return {};
};

// Menu API
export const getMenuItems = async () => {
    const response = await api.get(`/menus`);
    return response.data;
};

export const createMenuItem = async (menuItem) => {
    const response = await api.post(`/menus`, menuItem);
    return response.data;
};

export const updateMenuItem = async (id, menuItem) => {
    const response = await api.put(`/menus/${id}`, menuItem);
    return response.data;
};

export const deleteMenuItem = async (id) => {
    const response = await api.delete(`/menus/${id}`);
    return response.data;
};

// Categories API
export const getCategories = async () => {
    const response = await api.get(`/kategoris`);
    return response.data;
};

export const createCategory = async (category) => {
    const response = await api.post(`/kategoris`, category);
    return response.data;
};

export const updateCategory = async (id, category) => {
    const response = await api.put(`/kategoris/${id}`, category);
    return response.data;
};

export const deleteCategory = async (id) => {
    const response = await api.delete(`/kategoris/${id}`);
    return response.data;
};

// Customers API
export const getCustomers = async () => {
    const response = await api.get(`/pelanggans`);
    return response.data;
};

export const createCustomer = async (customer) => {
    const response = await api.post(`/pelanggans`, customer);
    return response.data;
};

export const updateCustomer = async (id, customer) => {
    const response = await api.put(`/pelanggans/${id}`, customer);
    return response.data;
};

export const deleteCustomer = async (id) => {
    const response = await api.delete(`/pelanggans/${id}`);
    return response.data;
};

// Admin Users API
export const getAdminUsers = async () => {
    const response = await api.get(`/admin-users`);
    return response.data;
};

export const createAdminUser = async (adminUser) => {
    const response = await api.post(`/admin-users`, adminUser);
    return response.data;
};

export const updateAdminUser = async (id, adminUser) => {
    const response = await api.put(`/admin-users/${id}`, adminUser);
    return response.data;
};

export const deleteAdminUser = async (id) => {
    const response = await api.delete(`/admin-users/${id}`);
    return response.data;
};