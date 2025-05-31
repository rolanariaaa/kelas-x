import React, { useEffect, useState } from 'react';
import { getMenuItems, createMenuItem, updateMenuItem, deleteMenuItem } from '../api';

const Menu = () => {
    const [menuItems, setMenuItems] = useState([]);
    const [newItem, setNewItem] = useState({ name: '', price: '' });
    const [editItem, setEditItem] = useState(null);

    useEffect(() => {
        fetchMenuItems();
    }, []);

    const fetchMenuItems = async () => {
        const items = await getMenuItems();
        setMenuItems(items);
    };

    const handleCreate = async () => {
        await createMenuItem(newItem);
        setNewItem({ name: '', price: '' });
        fetchMenuItems();
    };

    const handleUpdate = async () => {
        await updateMenuItem(editItem.id, editItem);
        setEditItem(null);
        fetchMenuItems();
    };

    const handleDelete = async (id) => {
        await deleteMenuItem(id);
        fetchMenuItems();
    };

    return (
        <div>
            <h2>Menu</h2>
            <div>
                <h3>Add Menu Item</h3>
                <input
                    type="text"
                    placeholder="Name"
                    value={newItem.name}
                    onChange={(e) => setNewItem({ ...newItem, name: e.target.value })}
                />
                <input
                    type="number"
                    placeholder="Price"
                    value={newItem.price}
                    onChange={(e) => setNewItem({ ...newItem, price: e.target.value })}
                />
                <button onClick={handleCreate}>Add</button>
            </div>
            <div>
                <h3>Menu Items</h3>
                <ul>
                    {menuItems.map(item => (
                        <li key={item.id}>
                            {item.name} - ${item.price}
                            <button onClick={() => setEditItem(item)}>Edit</button>
                            <button onClick={() => handleDelete(item.id)}>Delete</button>
                        </li>
                    ))}
                </ul>
            </div>
            {editItem && (
                <div>
                    <h3>Edit Menu Item</h3>
                    <input
                        type="text"
                        value={editItem.name}
                        onChange={(e) => setEditItem({ ...editItem, name: e.target.value })}
                    />
                    <input
                        type="number"
                        value={editItem.price}
                        onChange={(e) => setEditItem({ ...editItem, price: e.target.value })}
                    />
                    <button onClick={handleUpdate}>Update</button>
                    <button onClick={() => setEditItem(null)}>Cancel</button>
                </div>
            )}
        </div>
    );
};

export default Menu;