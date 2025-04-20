<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #1e90ff;
            --secondary-color: #2ecc71;
            --danger-color: #dc3545;
            --warning-color: #ffb22b;
            --dark-color: #2d3748;
            --light-color: #f7fafc;
            --border-radius: 8px;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--light-color);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
        }

        .dashboard-header {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: transform 0.2s ease;
            background: white;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .card-header {
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: white;
            background: var(--primary-color);
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #1565c0;
            border-color: #1565c0;
        }

        .btn-success {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-warning {
            background-color: var(--warning-color);
            border-color: var(--warning-color);
            color: #1a202c;
        }

        .form-control,
        .form-select {
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            padding: 0.5rem 1rem;
            transition: border-color 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.1);
        }

        .table {
            border-radius: var(--border-radius);
            overflow: hidden;
            background: white;
        }

        .table th {
            background: #f8fafc;
            color: var(--dark-color);
            font-weight: 600;
        }

        .table td {
            vertical-align: middle;
        }

        .balance-card {
            background: linear-gradient(135deg, var(--primary-color), #63b3ed);
            color: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }

        .dashboard-icon {
            font-size: 2.2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .user-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .user-list li {
            padding: 1rem;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-list li:last-child {
            border-bottom: none;
        }

        .user-role {
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .role-admin {
            background-color: var(--primary-color);
            color: white;
        }

        .role-siswa {
            background-color: var(--secondary-color);
            color: white;
        }

        .role-bank {
            background-color: var(--warning-color);
            color: #1a202c;
        }

        .transaction-approved {
            color: var(--secondary-color);
            font-weight: 600;
        }

        .transaction-rejected {
            color: var(--danger-color);
            font-weight: 600;
        }

        .transaction-pending {
            color: var(--warning-color);
            font-style: italic;
        }

        tr.approved-row {
            background-color: rgba(46, 204, 113, 0.05);
        }

        tr.rejected-row {
            background-color: rgba(231, 76, 60, 0.05);
        }

        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--shadow);
        }

        .modal-header {
            border-bottom: none;
            padding: 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: none;
            padding: 1rem 1.5rem;
        }

        .badge {
            padding: 0.4rem 0.8rem;
            font-weight: 500;
        }


        /* Theme khusus untuk role bank */
        [data-role="bank"] {
            --primary-color: #006d77;
            --secondary-color: #83c5be;
            --danger-color: #e63946;
            --warning-color: #ffb703;
            --dark-color: #023047;
            --light-color: #edf6f9;
        }

        [data-role="bank"] body {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        [data-role="bank"] .card-header {
            background: var(--primary-color);
            color: white;
        }

        [data-role="bank"] .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        [data-role="bank"] .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        [data-role="bank"] .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        [data-role="bank"] .transaction-approved {
            color: var(--secondary-color);
        }

        [data-role="bank"] .transaction-rejected {
            color: var(--danger-color);
        }

        [data-role="bank"] tr.approved-row {
            background-color: rgba(131, 197, 190, 0.1);
        }

        [data-role="bank"] tr.rejected-row {
            background-color: rgba(230, 57, 70, 0.05);
        }

        [data-role="bank"] .card:hover {
            transform: translateY(-6px);
        }

        [data-role="bank"] .badge.bg-warning {
            background-color: var(--warning-color) !important;
            color: #212529;
        }

        .bg-info {
            background-color: #006d77 !important;
            color: white !important;
        }

        .btn-info {
            background-color: #006d77;
            border-color: #006d77;
        }

        .btn-info:hover {
            background-color: #045c64;
            border-color: #045c64;
        }
    </style>
</head>

<body data-role="bank">
    <div class="container py-5">
        <div class="dashboard-header">
            <div class="d-flex align-items-center gap-3">
                <h2 class="mb-0">Welcome, {{ Auth::user()->name }}</h2>
                <span class="badge bg-secondary">{{ ucfirst(Auth::user()->role) }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger"><i
                        class="fas fa-sign-out-alt me-2"></i>Logout</button>
            </form>
        </div>

        @if(Auth::user()->role == 'admin')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header bg-dark">
                            <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="card text-center p-3">
                                        <div class="dashboard-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <h3>{{ $users->count() }}</h3>
                                        <p class="text-muted mb-0">Total Users</p>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <i class="fas fa-exchange-alt me-2"></i>Recent Transactions
                                        </div>
                                        <div class="card-body">
                                            @if($mutasi->isEmpty())
                                                <p class="text-center text-muted">No transactions found.</p>
                                            @else
                                                <ul class="list-group list-group-flush">
                                                    @foreach($mutasi->take(5) as $mutation)
                                                        <li class="list-group-item">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <span
                                                                        class="@if($mutation->status == 'approved') transaction-approved @elseif($mutation->status == 'rejected') transaction-rejected @endif">
                                                                        {{ $mutation->description }}
                                                                    </span><br>
                                                                    <small class="text-muted">
                                                                        {{ $mutation->user->name ?? 'Unknown' }}
                                                                    </small>
                                                                </div>
                                                                <small class="text-muted">
                                                                    {{ $mutation->created_at->format('d M Y H:i') }}
                                                                </small>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-users me-2"></i>User Management
                                </h5>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                        <i class="fas fa-user-plus me-2"></i>Add New User
                                    </button>
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#allUsersModal">
                                        <i class="fas fa-list me-2"></i>See All Users
                                    </button>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Recent Users
                                </div>
                                <div class="card-body">
                                    @if($users->isEmpty())
                                        <p class="text-center text-muted">No users found.</p>
                                    @else
                                        <ul class="user-list">
                                            @foreach($users->take(4) as $user)
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <strong>{{ $user->name }}</strong><br>
                                                        <span class="text-muted">{{ $user->email }}</span><br>
                                                        <span
                                                            class="user-role role-{{ $user->role }}">{{ ucfirst($user->role) }}</span>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                            data-bs-target="#editUserModal{{ $user->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <form action="{{ route('delete-user', $user->id) }}" method="POST"
                                                            style="display:inline;"
                                                            onsubmit="return confirm('Yakin gak min mau hapus siswa ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>

                            @foreach($users as $user)
                                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('update-user', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $user->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ $user->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">New Password (optional)</label>
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Confirm New Password</label>
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update User</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('add-user') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="siswa">Siswa</option>
                                        <option value="admin">Admin</option>
                                        <option value="bank">Bank</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="allUsersModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="fas fa-users me-2"></i>All Users</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if($users->isEmpty())
                                <p class="text-center text-muted">No users found.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td><span
                                                            class="badge bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'bank' ? 'warning' : 'info') }}">{{ ucfirst($user->role) }}</span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                            data-bs-target="#editUserModal{{ $user->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <form action="{{ route('delete-user', $user->id) }}" method="POST"
                                                            style="display:inline;"
                                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(Auth::user()->role == 'siswa')
            <div class="row">
                <div class="col-md-12">
                    <div class="balance-card">
                        <h4 class="mb-2">Your Balance</h4>
                        <h2 class="fw-bold">Rp {{ number_format($saldo, 0, ',', '.') }}</h2>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-primary">
                            <i class="fas fa-arrow-up me-2"></i>Top-up Balance
                        </div>
                        <div class="card-body">
                            <form action="{{ route('topUp') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="credit" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" name="credit" id="credit" required>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Top-up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-danger">
                            <i class="fas fa-arrow-down me-2"></i>Withdraw Balance
                        </div>
                        <div class="card-body">
                            <form action="{{ route('withdraw') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="credit" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" name="credit" id="credit" required>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-danger">Withdraw</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-warning">
                            <i class="fas fa-exchange-alt me-2"></i>Transfer Balance
                        </div>
                        <div class="card-body">
                            <form action="{{ route('transfer') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="recepient_id" class="form-label">Recipient</label>
                                    <select name="recepient_id" class="form-select" required>
                                        @foreach($users as $user)
                                            @if($user->role == 'siswa' && $user->id != Auth::user()->id)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="amount" class="form-control" required>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning">Transfer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card transaction-card">
                        <div class="card-header">
                            <i class="fas fa-history me-2"></i>Transaction History
                        </div>
                        <div class="card-body">
                            @if($mutasi->isEmpty())
                                <p class="text-center text-muted">No transactions yet.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mutasi as $item)
                                                <tr
                                                    class="{{ $item->status == 'approved' ? 'approved-row' : ($item->status == 'rejected' ? 'rejected-row' : '') }}">
                                                    <td>{{ $item->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td
                                                        class="{{ $item->status == 'approved' ? 'transaction-approved' : ($item->status == 'rejected' ? 'transaction-rejected' : 'text-danger') }}">
                                                        {{ $item->debit > 0 ? 'Rp ' . number_format($item->debit, 0, ',', '.') : '-' }}
                                                    </td>
                                                    <td
                                                        class="{{ $item->status == 'approved' ? 'transaction-approved' : ($item->status == 'rejected' ? 'transaction-rejected' : 'text-success') }}">
                                                        {{ $item->credit > 0 ? 'Rp ' . number_format($item->credit, 0, ',', '.') : '-' }}
                                                    </td>
                                                    <td>
                                                        @if($item->status == 'done')
                                                            <span class="badge bg-success">Done</span>
                                                        @elseif($item->status == 'rejected')
                                                            <span class="badge bg-danger">Rejected</span>
                                                        @else
                                                            <span class="badge bg-warning text-dark">Process</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row g-4">
            @if(Auth::user()->role == 'bank')
                {{-- TopUp Siswa Section --}}
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-header bg-info text-white">
                            <i class="fas fa-exchange-alt me-2"></i>Top-up Siswa
                        </div>
                        <div class="card-body">
                            <form action="{{ route('topup.siswa') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="recepient_id" class="form-label">Recipient</label>
                                    <select name="recepient_id" class="form-select" required>
                                        @foreach($users as $user)
                                            @if($user->role == 'siswa' && $user->id != Auth::user()->id)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="amount" class="form-control" min="1" required>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-info text-white">
                                        <i class="fas fa-paper-plane me-1"></i>Top-Up
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Payment Request Section --}}
                <div class="col-md-8">
                    <div class="card h-100">
                        <div class="card-header bg-warning text-dark d-flex align-items-center">
                            <i class="fas fa-money-check-alt me-2"></i>
                            <span>Payment Requests</span>
                        </div>
                        <div class="card-body">
                            @if($request_payment->isEmpty())
                                <p class="text-center text-muted mb-0">No payment requests at the moment.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>Request Date</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($request_payment as $wallet)
                                                <tr>
                                                    <td>{{ $wallet->user->name ?? 'Unknown' }}</td>
                                                    <td>{{ $wallet->description }}</td>
                                                    <td>Rp {{ number_format($wallet->credit - $wallet->debit, 0, ',', '.') }}</td>
                                                    <td>{{ $wallet->created_at->format('d M Y H:i') }}</td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <form action="{{ route('approve', $wallet->id) }}" method="POST"
                                                                title="Accept Request">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-success"
                                                                    data-bs-toggle="tooltip" title="Accept">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('reject', $wallet->id) }}" method="POST"
                                                                title="Reject Request">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    data-bs-toggle="tooltip" title="Reject">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- All Transactions Section --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-list me-2"></i>All Transactions</div>
                            <button class="btn btn-sm download-pdf-btn"
                                style="background-color: #edf2f7; color: var(--primary-color); border: 1px solid var(--primary-color);"
                                onclick="window.location.href='{{ route('export-transactions-pdf') }}'">
                                <i class="fas fa-download me-1"></i>Download PDF (30 Days)
                            </button>
                        </div>
                        <div class="card-body">
                            @if($mutasi->isEmpty())
                                <p class="text-center text-muted mb-0">No transactions found.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mutasi as $item)
                                                <tr
                                                    class="{{ $item->status == 'approved' ? 'approved-row' : ($item->status == 'rejected' ? 'rejected-row' : '') }}">
                                                    <td>{{ $item->user->name ?? 'Unknown' }}</td>
                                                    <td>{{ $item->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td class="{{ $item->debit > 0 ? 'transaction-approved' : '' }}">
                                                        {{ $item->debit > 0 ? 'Rp ' . number_format($item->debit, 0, ',', '.') : '-' }}
                                                    </td>
                                                    <td class="{{ $item->credit > 0 ? 'transaction-approved' : '' }}">
                                                        {{ $item->credit > 0 ? 'Rp ' . number_format($item->credit, 0, ',', '.') : '-' }}
                                                    </td>
                                                    <td>
                                                        @if($item->status == 'done')
                                                            <span class="badge bg-success">Done</span>
                                                        @elseif($item->status == 'rejected')
                                                            <span class="badge bg-danger">Rejected</span>
                                                        @else
                                                            <span class="badge bg-warning text-dark">Process</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <style>
            .download-pdf-btn:hover {
                background-color: var(--primary-color) !important;
                color: white !important;
                border-color: var(--primary-color) !important;
                transition: all 0.2s ease;
            }
        </style>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>