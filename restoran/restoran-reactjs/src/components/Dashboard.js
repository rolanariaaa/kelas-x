import React, { useEffect, useState } from 'react';
import { getDashboardData } from '../api';

const Dashboard = () => {
    const [data, setData] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const getData = async () => {
            try {
                const result = await getDashboardData();
                setData(result);
            } catch (err) {
                setError(err);
            } finally {
                setLoading(false);
            }
        };

        getData();
    }, []);

    if (loading) return <div>Loading...</div>;
    if (error) return <div>Error loading dashboard data: {error.message}</div>;

    return (
        <div>
            <h1>Dashboard</h1>
            {data && (
                <div>
                    <h2>Statistics</h2>
                    <p>Total Menu Items: {data.totalMenuItems}</p>
                    <p>Total Categories: {data.totalCategories}</p>
                    <p>Total Customers: {data.totalCustomers}</p>
                    <p>Total Admin Users: {data.totalAdminUsers}</p>
                </div>
            )}
        </div>
    );
};

export default Dashboard;