import React, { useEffect, useState } from 'react';
import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: { 'Content-Type': 'application/json' },
});

function Customers() {
  const [customers, setCustomers] = useState([]);
  const [form, setForm] = useState({ name: '', phone: '' });
  const [editingId, setEditingId] = useState(null);

  const fetchCustomers = async () => {
    const res = await api.get('/customers');
    setCustomers(res.data);
  };

  useEffect(() => { fetchCustomers(); }, []);

  const handleCreate = async (e) => {
    e.preventDefault();
    await api.post('/customers', form);
    setForm({ name: '', phone: '' });
    fetchCustomers();
  };

  const handleEdit = (cust) => {
    setForm({ name: cust.name, phone: cust.phone });
    setEditingId(cust.id);
  };

  const handleUpdate = async (e) => {
    e.preventDefault();
    await api.put(`/customers/${editingId}`, form);
    setForm({ name: '', phone: '' });
    setEditingId(null);
    fetchCustomers();
  };

  const handleDelete = async (id) => {
    await api.delete(`/customers/${id}`);
    fetchCustomers();
  };

  return (
    <div>
      <h2>Manajemen Pelanggan</h2>
      <form onSubmit={editingId ? handleUpdate : handleCreate}>
        <input
          type="text"
          placeholder="Nama"
          value={form.name}
          onChange={e => setForm({ ...form, name: e.target.value })}
          required
        />
        <input
          type="text"
          placeholder="No. Telepon"
          value={form.phone}
          onChange={e => setForm({ ...form, phone: e.target.value })}
          required
        />
        <button type="submit">{editingId ? 'Update' : 'Tambah'}</button>
        {editingId && <button type="button" onClick={() => { setEditingId(null); setForm({ name: '', phone: '' }); }}>Batal</button>}
      </form>
      <ul>
        {customers.map(cust => (
          <li key={cust.id}>
            {cust.name} ({cust.phone})
            <button onClick={() => handleEdit(cust)}>Edit</button>
            <button onClick={() => handleDelete(cust.id)}>Hapus</button>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Customers;