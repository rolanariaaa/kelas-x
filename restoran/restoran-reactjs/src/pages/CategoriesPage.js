import React, { useEffect, useState } from 'react';
import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: { 'Content-Type': 'application/json' },
});

function Categories() {
  const [categories, setCategories] = useState([]);
  const [form, setForm] = useState({ name: '' });
  const [editingId, setEditingId] = useState(null);

  const fetchCategories = async () => {
    const res = await api.get('/categories');
    setCategories(res.data);
  };

  useEffect(() => { fetchCategories(); }, []);

  const handleCreate = async (e) => {
    e.preventDefault();
    await api.post('/categories', form);
    setForm({ name: '' });
    fetchCategories();
  };

  const handleEdit = (cat) => {
    setForm({ name: cat.name });
    setEditingId(cat.id);
  };

  const handleUpdate = async (e) => {
    e.preventDefault();
    await api.put(`/categories/${editingId}`, form);
    setForm({ name: '' });
    setEditingId(null);
    fetchCategories();
  };

  const handleDelete = async (id) => {
    await api.delete(`/categories/${id}`);
    fetchCategories();
  };

  return (
    <div>
      <h2>Manajemen Kategori</h2>
      <form onSubmit={editingId ? handleUpdate : handleCreate}>
        <input
          type="text"
          placeholder="Nama Kategori"
          value={form.name}
          onChange={e => setForm({ ...form, name: e.target.value })}
          required
        />
        <button type="submit">{editingId ? 'Update' : 'Tambah'}</button>
        {editingId && <button type="button" onClick={() => { setEditingId(null); setForm({ name: '' }); }}>Batal</button>}
      </form>
      <ul>
        {categories.map(cat => (
          <li key={cat.id}>
            {cat.name}
            <button onClick={() => handleEdit(cat)}>Edit</button>
            <button onClick={() => handleDelete(cat.id)}>Hapus</button>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Categories;