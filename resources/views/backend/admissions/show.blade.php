@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Admission Details</h3>

    <div class="card mb-3">
        <div class="card-body">
            <!-- Header with user link or name -->
            <h5 class="mb-3 pb-3 border-bottom">
                @if($admission->user)
                    <a href="{{ route('admin.users.show', $admission->user->id) }}">{{ $admission->user->name }}</a>
                @else
                    {{ $admission->name }}
                @endif
                <span class="badge bg-{{ $admission->status == 'accepted' ? 'success' : ($admission->status == 'rejected' ? 'danger' : 'warning') }} float-end">
                    {{ ucfirst($admission->status) }}
                </span>
            </h5>

            <!-- Personal Information Section -->
            <div class="mb-4">
                <h6 class="fw-bold">Personal Information</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $admission->name }}</p>
                        <p><strong>Gender:</strong> {{ $admission->gender ?? '-' }}</p>
                        <p><strong>Date of Birth:</strong> {{ $admission->date_of_birth ? $admission->date_of_birth->format('d M Y') : '-' }}</p>
                        <p><strong>Place of Birth:</strong> {{ $admission->place_of_birth ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nationality:</strong> {{ $admission->nationality ?? '-' }}</p>
                        <p><strong>Email:</strong> {{ $admission->email }}</p>
                        <p><strong>Phone:</strong> {{ $admission->phone ?? '-' }}</p>
                        <p><strong>Postal Code:</strong> {{ $admission->postal_code ?? '-' }}</p>
                    </div>
                </div>
                <p><strong>City / Locality:</strong> {{ $admission->city ?? '-' }}</p>
                <p><strong>Address:</strong> {{ $admission->address ?? '-' }}</p>
                <hr>
                <p><strong>Identification Document No.:</strong> {{ $admission->identification_document_no ?? '-' }}</p>
                <p><strong>ID Expiry Date:</strong> {{ $admission->identification_expiry_date ? $admission->identification_expiry_date->format('d M Y') : '-' }}</p>
            </div>

            <!-- Educational Background Section -->
            <div class="mb-4">
                <h6 class="fw-bold">Educational Background</h6>
                <p><strong>Highest Level of Education:</strong> {{ $admission->education_level ?? '-' }}</p>
                <p><strong>Other Qualifications:</strong></p>
                <p class="text-muted">{{ $admission->other_qualifications ?? '-' }}</p>
            </div>

            <!-- Employment Status Section -->
            <div class="mb-4">
                <h6 class="fw-bold">Employment Status</h6>
                <p><strong>Current Employment:</strong> {{ $admission->employment_status ?? '-' }}</p>
                <p><strong>Professional Training (Past 2 Years):</strong> 
                    <span class="badge bg-info">{{ $admission->attended_training_courses ? 'Yes' : 'No' }}</span>
                </p>
                @if($admission->attended_training_courses)
                    <p><strong>Training Details:</strong></p>
                    <p class="text-muted">{{ $admission->professional_training ?? '-' }}</p>
                @endif
            </div>

            <!-- Desired Course Section -->
            <div class="mb-4">
                <h6 class="fw-bold">Desired Course</h6>
                <p><strong>Course:</strong> {{ $admission->desired_course ?? '-' }}</p>
            </div>

            <!-- Consent & Agreements Section -->
            <div class="mb-4">
                <h6 class="fw-bold">Consent & Agreements</h6>
                <p>
                    <strong>Training Regulations Accepted:</strong> 
                    <span class="badge bg-{{ $admission->training_regulations_accepted ? 'success' : 'danger' }}">
                        {{ $admission->training_regulations_accepted ? 'Yes' : 'No' }}
                    </span>
                </p>
                <p>
                    <strong>Personal Data Disclosure Authorized:</strong> 
                    <span class="badge bg-{{ $admission->personal_data_disclosure_authorized ? 'success' : 'danger' }}">
                        {{ $admission->personal_data_disclosure_authorized ? 'Yes' : 'No' }}
                    </span>
                </p>
            </div>

            <!-- Admin Notes -->
            <div class="mb-4 p-3 bg-light rounded">
                <h6 class="fw-bold">Admin Notes</h6>
                <p>{!! $admission->notes ?? '<em class="text-muted">No notes</em>' !!}</p>
            </div>

            <!-- Submission Date -->
            <div class="small text-muted">
                <p>Submitted: {{ $admission->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <a href="{{ route('admin.admissions.edit', $admission) }}" class="btn btn-secondary">Edit</a>
        <a href="{{ route('admin.admissions.index') }}" class="btn btn-light">Back to list</a>
    </div>
</div>
@endsection
