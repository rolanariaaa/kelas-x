import React, { useEffect, useState } from 'react';
import { getAdminUsers, createAdminUser, updateAdminUser, deleteAdminUser } from '../api';

const AdminUsers = () => {
    const [adminUsers, setAdminUsers] = useState([]);
    const [newUser, setNewUser] = useState({ name: '', email: '' });
    const [editingUser, setEditingUser] = useState(null);

    useEffect(() => {
        fetchAdminUsers();
    }, []);

    const fetchAdminUsers = async () => {
        const users = await getAdminUsers();
        setAdminUsers(users);
    };

    const handleCreate = async () => {
        await createAdminUser(newUser);
        setNewUser({ name: '', email: '' });
        fetchAdminUsers();
    };

    const handleEdit = (user) => {
        setEditingUser(user);
        setNewUser({ name: user.name, email: user.email });
    };

    const handleUpdate = async () => {
        await updateAdminUser(editingUser.id, newUser);
        setEditingUser(null);
        setNewUser({ name: '', email: '' });
        fetchAdminUsers();
    };

    const handleDelete = async (id) => {
        await deleteAdminUser(id);
        fetchAdminUsers();
    };

    return (
        <div>
            <h2>Admin Users</h2>
            <form onSubmit={(e) => {
                e.preventDefault();
                editingUser ? handleUpdate() : handleCreate();
            }}>
                <input
                    type="text"
                    placeholder="Name"
                    value={newUser.name}
                    onChange={(e) => setNewUser({ ...newUser, name: e.target.value })}
                    required
                />
                <input
                    type="email"
                    placeholder="Email"
                    value={newUser.email}
                    onChange={(e) => setNewUser({ ...newUser, email: e.target.value })}
                    required
                />
                <button type="submit">{editingUser ? 'Update' : 'Create'}</button>
            </form>
            <ul>
                {adminUsers.map(user => (
                    <li key={user.id}>
                        {user.name} - {user.email}
                        <button onClick={() => handleEdit(user)}>Edit</button>
                        <button onClick={() => handleDelete(user.id)}>Delete</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default AdminUsers;