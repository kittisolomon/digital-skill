@extends('admin.index')

@section('content')
<style>
    #backupsTable {
        text-align: center;
    }
    
    #backupsTable thead th {
        text-align: center !important;
        vertical-align: middle;
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }
    
    #backupsTable tbody td {
        text-align: center !important;
        vertical-align: middle;
        padding: 12px 8px;
    }
    
    #backupsTable .badge {
        font-size: 0.75rem;
        padding: 0.5em 0.75em;
    }
    
    #backupsTable .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }
    
    .dataTables_wrapper {
        text-align: center;
    }
    
    .dataTables_filter {
        text-align: center !important;
        margin-bottom: 15px;
    }
    
    .dataTables_length {
        text-align: center !important;
        margin-bottom: 15px;
    }
    
    .dataTables_info {
        text-align: center !important;
        margin-top: 15px;
    }
    
    .dataTables_paginate {
        text-align: center !important;
        margin-top: 15px;
    }
</style>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Database Backup</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="card-title mb-0">Backup Settings</h5>
                            <p class="mb-0">You can create backups manually or set an automatic backup interval.</p>
                        </div>
                    </div>

                    <!-- Manual Backup -->
                    <form action="{{ route('admin.backup.manual') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary mb-3">
                            <i class="bi bi-download"></i> Backup Now
                        </button>
                    </form>

                    <!-- Auto Backup Settings -->
                    <form action="{{ route('admin.backup.settings') }}" method="POST">
                        @csrf
                        <div class="form-check">
                            <input type="checkbox" name="auto_backup" id="auto_backup" class="form-check-input"
                                {{ $settings->auto_backup ? 'checked' : '' }}>
                            <label class="form-check-label" for="auto_backup">Enable Automatic Backup</label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="interval">Select Backup Interval:</label>
                            <select name="interval" class="form-control">
                                <option value="daily" {{ $settings->interval == 'daily' ? 'selected' : '' }}>Daily</option>
                                <option value="weekly" {{ $settings->interval == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                <option value="monthly" {{ $settings->interval == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Save Settings</button>
                    </form>

                    <!-- Backup Logs -->
                    <h5 class="mt-5">Backup Logs</h5>
                    <table class="table table-striped table-hover dt-responsive" id="backupsTable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Backup Type</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Interval</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($backups as $index => $backup)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ $backup->type == 'manual' ? 'primary' : 'success' }}">
                                        {{ ucfirst($backup->type) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $backup->user ? $backup->user->name : 'System' }}</td>
                                <td class="text-center">{{ $backup->created_at->format('Y-m-d H:i') }}</td>
                                <td class="text-center">
                                    @if($backup->interval)
                                        <span class="badge bg-info">{{ ucfirst($backup->interval) }}</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.backup.download', $backup) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        new DataTable('#backupsTable', {
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            dom: 'Bfrtip',
            pageLength: 10,
            order: [[3, 'desc']], // Sort by date column (index 3) in descending order
            columnDefs: [
                {
                    targets: [0, 1, 2, 3, 4], // All columns except action
                    className: 'text-center'
                },
                {
                    targets: [5], // Action column
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                }
            ],
            language: {
                search: "Search backups:",
                lengthMenu: "Show _MENU_ backups per page",
                info: "Showing _START_ to _END_ of _TOTAL_ backups",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script>
@endsection

