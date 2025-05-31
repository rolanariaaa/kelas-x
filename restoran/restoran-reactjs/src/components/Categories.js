import React, { useEffect, useState } from 'react';
import { getCategories, createCategory, updateCategory, deleteCategory } from '../api';

const Categories = () => {
    const [categories, setCategories] = useState([]);
    const [categoryName, setCategoryName] = useState('');
    const [editingCategoryId, setEditingCategoryId] = useState(null);

    useEffect(() => {
        fetchCategories();
    }, []);

    const fetchCategories = async () => {
        const data = await getCategories();
        setCategories(data);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (editingCategoryId) {
            await updateCategory(editingCategoryId, { name: categoryName });
        } else {
            await createCategory({ name: categoryName });
        }
        setCategoryName('');
        setEditingCategoryId(null);
        fetchCategories();
    };

    const handleEdit = (category) => {
        setCategoryName(category.name);
        setEditingCategoryId(category.id);
    };

    const handleDelete = async (id) => {
        await deleteCategory(id);
        fetchCategories();
    };

    return (
        <div>
            <h2>Categories</h2>
            <form onSubmit={handleSubmit}>
                <input
                    type="text"
                    value={categoryName}
                    onChange={(e) => setCategoryName(e.target.value)}
                    placeholder="Category Name"
                    required
                />
                <button type="submit">{editingCategoryId ? 'Update' : 'Add'} Category</button>
            </form>
            <ul>
                {categories.map((category) => (
                    <li key={category.id}>
                        {category.name}
                        <button onClick={() => handleEdit(category)}>Edit</button>
                        <button onClick={() => handleDelete(category.id)}>Delete</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Categories;