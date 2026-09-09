@extends('layouts.dashboard')


<div class="container attempts-page py-4">

    <h3 class="mb-4">Student Attempts</h3>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Test Name</th>
                            <th>Attempt Date</th>
                            <th>Status</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($attempts as $attempt)

                        <tr>

                            <td>
                                {{ $attempt->student_name }}
                            </td>

                            <td>
                                {{ $attempt->test_name }}
                            </td>

                            <td>
                                {{ $attempt->started_at }}
                            </td>

                            <td>
                                {{ $attempt->status }}
                            </td>

                           

                            <td>
                                <a href="{{ route('attempts.answers', $attempt->id) }}"
                                   class="btn btn-primary btn-sm">
                                    View Result
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

<style>
    /* ================================
   Student Attempts — White & Green
================================ */

.attempts-page {
    --primary-green: #168a55;
    --dark-green: #10683f;
    --light-green: #eaf7f0;
    --lighter-green: #f6fcf8;
    --border-color: #dbe9e1;
    --primary-text: #203129;
    --secondary-text: #6b7d73;

    color: var(--primary-text);
    font-family: Arial, Helvetica, sans-serif;
}

/* Page title */
.attempts-page h3 {
    position: relative;
    margin-bottom: 28px !important;
    padding-left: 18px;
    color: var(--primary-text);
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.4px;
}

.attempts-page h3::before {
    position: absolute;
    top: 4px;
    bottom: 4px;
    left: 0;
    width: 5px;
    content: "";
    border-radius: 10px;
    background-color: var(--primary-green);
}

/* Main card */
.attempts-page .card {
    overflow: hidden;
    border: 1px solid var(--border-color) !important;
    border-radius: 14px;
    background-color: #ffffff;
    box-shadow:
        0 1px 2px rgba(16, 104, 63, 0.04),
        0 12px 32px rgba(16, 104, 63, 0.08) !important;
}

.attempts-page .card-body {
    padding: 0;
}

/* Responsive table container */
.attempts-page .table-responsive {
    border-radius: 14px;
}

/* Table */
.attempts-page .table {
    width: 100%;
    min-width: 760px;
    margin-bottom: 0;
    vertical-align: middle;
}

/* Table heading */
.attempts-page .table thead {
    background: linear-gradient(
        135deg,
        var(--dark-green),
        var(--primary-green)
    );
}

.attempts-page .table thead th {
    padding: 17px 20px;
    border: 0;
    background-color: transparent;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    white-space: nowrap;
}

/* Table rows */
.attempts-page .table tbody tr {
    transition:
        background-color 0.2s ease,
        transform 0.2s ease;
}

.attempts-page .table tbody tr:nth-child(even) {
    background-color: var(--lighter-green);
}

.attempts-page .table tbody tr:hover {
    background-color: var(--light-green);
}

/* Table cells */
.attempts-page .table tbody td {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
    color: var(--primary-text);
    font-size: 14px;
}

.attempts-page .table tbody tr:last-child td {
    border-bottom: 0;
}

/* Student name */
.attempts-page .table tbody td:first-child {
    color: var(--dark-green);
    font-weight: 700;
}

/* Status column */
.attempts-page .table tbody td:nth-child(4) {
    color: var(--primary-green);
    font-weight: 700;
    text-transform: capitalize;
}

/* View Result button */
.attempts-page .btn-primary {
    display: inline-flex;
    min-height: 36px;
    align-items: center;
    justify-content: center;
    padding: 8px 15px;
    border: 1px solid var(--primary-green);
    border-radius: 7px;
    background-color: var(--primary-green);
    box-shadow: 0 4px 10px rgba(22, 138, 85, 0.16);
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    white-space: nowrap;
    transition:
        background-color 0.2s ease,
        border-color 0.2s ease,
        box-shadow 0.2s ease,
        transform 0.2s ease;
}

.attempts-page .btn-primary:hover,
.attempts-page .btn-primary:focus {
    border-color: var(--dark-green);
    background-color: var(--dark-green);
    box-shadow: 0 6px 16px rgba(16, 104, 63, 0.22);
    color: #ffffff;
    transform: translateY(-1px);
}

.attempts-page .btn-primary:focus-visible {
    outline: 3px solid rgba(22, 138, 85, 0.22);
    outline-offset: 3px;
}

.attempts-page .btn-primary:active {
    transform: translateY(0);
}

/* Empty table message */
.attempts-page .table tbody td[colspan] {
    padding: 45px 20px;
    color: var(--secondary-text);
    text-align: center;
}

/* Custom scrollbar */
.attempts-page .table-responsive::-webkit-scrollbar {
    height: 8px;
}

.attempts-page .table-responsive::-webkit-scrollbar-track {
    background-color: #edf5f0;
}

.attempts-page .table-responsive::-webkit-scrollbar-thumb {
    border-radius: 20px;
    background-color: #9acbb0;
}

.attempts-page .table-responsive::-webkit-scrollbar-thumb:hover {
    background-color: var(--primary-green);
}

/* Tablet and mobile */
@media (max-width: 767.98px) {
    .attempts-page {
        padding-right: 12px;
        padding-left: 12px;
    }

    .attempts-page h3 {
        margin-bottom: 20px !important;
        font-size: 23px;
    }

    .attempts-page .card {
        border-radius: 10px;
    }

    .attempts-page .table thead th,
    .attempts-page .table tbody td {
        padding: 14px 16px;
    }
}
</style>



@section('content')
@endsection