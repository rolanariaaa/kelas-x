import React from 'react';
import { Link } from 'react-router-dom';
import './Navbar.css';

const Navbar = () => (
  <nav className="navbar">
    <ul>
      <li><Link to="/">Dashboard</Link></li>
      <li><Link to="/menu">Menu</Link></li>
      <li><Link to="/categories">Kategori</Link></li>
      <li><Link to="/customers">Pelanggan</Link></li>
      <li><Link to="/admin-users">User Admin</Link></li>
    </ul>
  </nav>
);

export default Navbar;
