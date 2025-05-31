import React, { useEffect, useState } from 'react';
import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api', // Ganti sesuai alamat backend Laravel Anda
  headers: {
    'Content-Type': 'application/json',
  },
});

function Users() {
  const [users, setUsers] = useState([]);
  const [form, setForm] = useState({ name: '', email: '' });
  const [editingId, setEditingId] = useState(null);

  // Ambil data users
  const fetchUsers = async () => {
    const res = await api.get('/users');
    setUsers(res.data);
  };

  useEffect(() => {
    fetchUsers();
  }, []);

  // Tambah user
  const handleCreate = async (e) => {
    e.preventDefault();
    await api.post('/users', form);
    setForm({ name: '', email: '' });
    fetchUsers();
  };

  // Edit user
  const handleEdit = (user) => {
    setForm({ name: user.name, email: user.email });
    setEditingId(user.id);
  };

  // Update user
  const handleUpdate = async (e) => {
    e.preventDefault();
    await api.put(`/users/${editingId}`, form);
    setForm({ name: '', email: '' });
    setEditingId(null);
    fetchUsers();
  };

  // Hapus user
  const handleDelete = async (id) => {
    await api.delete(`/users/${id}`);
    fetchUsers();
  };

  return (
    <div>
      <h2>Manajemen Users</h2>
      <form onSubmit={editingId ? handleUpdate : handleCreate}>
        <input
          type="text"
          placeholder="Nama"
          value={form.name}
          onChange={e => setForm({ ...form, name: e.target.value })}
          required
        />
        <input
          type="email"
          placeholder="Email"
          value={form.email}
          onChange={e => setForm({ ...form, email: e.target.value })}
          required
        />
        <button type="submit">{editingId ? 'Update' : 'Tambah'}</button>
        {editingId && <button type="button" onClick={() => { setEditingId(null); setForm({ name: '', email: '' }); }}>Batal</button>}
      </form>
      <table border="1" cellPadding="8">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          {users.map(user => (
            <tr key={user.id}>
              <td>{user.name}</td>
              <td>{user.email}</td>
              <td>
                <button onClick={() => handleEdit(user)}>Edit</button>
                <button onClick={() => handleDelete(user.id)}>Hapus</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Users;