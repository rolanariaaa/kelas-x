import React, { useEffect, useState } from 'react';
import axios from 'axios';
import Menu from '../components/Menu';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: { 'Content-Type': 'application/json' },
});

function MenuPage() {
  const [menus, setMenus] = useState([]);
  const [form, setForm] = useState({ name: '', price: '', category_id: '' });
  const [editingId, setEditingId] = useState(null);

  const fetchMenus = async () => {
    const res = await api.get('/menu');
    setMenus(res.data);
  };

  useEffect(() => { fetchMenus(); }, []);

  const handleCreate = async (e) => {
    e.preventDefault();
    await api.post('/menu', form);
    setForm({ name: '', price: '', category_id: '' });
    fetchMenus();
  };

  const handleEdit = (menu) => {
    setForm({ name: menu.name, price: menu.price, category_id: menu.category_id });
    setEditingId(menu.id);
  };

  const handleUpdate = async (e) => {
    e.preventDefault();
    await api.put(`/menu/${editingId}`, form);
    setForm({ name: '', price: '', category_id: '' });
    setEditingId(null);
    fetchMenus();
  };

  const handleDelete = async (id) => {
    await api.delete(`/menu/${id}`);
    fetchMenus();
  };

  return (
    <div>
      <h1>Menu Management</h1>
      <Menu />
      <h2>Manajemen Menu</h2>
      <form onSubmit={editingId ? handleUpdate : handleCreate}>
        <input
          type="text"
          placeholder="Nama Menu"
          value={form.name}
          onChange={e => setForm({ ...form, name: e.target.value })}
          required
        />
        <input
          type="number"
          placeholder="Harga"
          value={form.price}
          onChange={e => setForm({ ...form, price: e.target.value })}
          required
        />
        <input
          type="text"
          placeholder="ID Kategori"
          value={form.category_id}
          onChange={e => setForm({ ...form, category_id: e.target.value })}
          required
        />
        <button type="submit">{editingId ? 'Update' : 'Tambah'}</button>
        {editingId && <button type="button" onClick={() => { setEditingId(null); setForm({ name: '', price: '', category_id: '' }); }}>Batal</button>}
      </form>
      <ul>
        {menus.map(menu => (
          <li key={menu.id}>
            {menu.name} - Rp{menu.price} (Kategori: {menu.category_id})
            <button onClick={() => handleEdit(menu)}>Edit</button>
            <button onClick={() => handleDelete(menu.id)}>Hapus</button>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default MenuPage;