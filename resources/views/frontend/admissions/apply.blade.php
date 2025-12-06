@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4">Admission Form</h3>
                    
                    <form action="{{ route('admissions.store') }}" method="POST">
                        @csrf
                        
                        <!-- Section 1: Personal Information -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">1. Personal Information</h5>
                            
                            <div class="row g-3 mt-2">
                                <div class="col-md-8">
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                    @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Male" {{ old('gender')=='Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender')=='Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender')=='Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Place of Birth</label>
                                    <input type="text" name="place_of_birth" value="{{ old('place_of_birth') }}" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nationality</label>
                                    <input type="text" name="nationality" value="{{ old('nationality') }}" class="form-control">
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City / Locality</label>
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Phone *</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required>
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Identification Document No.</label>
                                    <input type="text" name="identification_document_no" value="{{ old('identification_document_no') }}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ID Expiry Date</label>
                                    <input type="date" name="identification_expiry_date" value="{{ old('identification_expiry_date') }}" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" class="form-control" required>
                                    @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Educational Background -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">2. Educational Background</h5>
                            
                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label">Highest Level of Education</label>
                                    <select name="education_level" class="form-control">
                                        <option value="">Select education level</option>
                                        <option value="Pre-school" {{ old('education_level')=='Pre-school' ? 'selected' : '' }}>Pre-school</option>
                                        <option value="1st Cycle (4th year)" {{ old('education_level')=='1st Cycle (4th year)' ? 'selected' : '' }}>1st Cycle (4th year)</option>
                                        <option value="2nd Cycle (6th year)" {{ old('education_level')=='2nd Cycle (6th year)' ? 'selected' : '' }}>2nd Cycle (6th year)</option>
                                        <option value="3rd Cycle (9th year)" {{ old('education_level')=='3rd Cycle (9th year)' ? 'selected' : '' }}>3rd Cycle (9th year)</option>
                                        <option value="Secondary Education (12th year)" {{ old('education_level')=='Secondary Education (12th year)' ? 'selected' : '' }}>Secondary Education (12th year)</option>
                                        <option value="Bachelor's Degree" {{ old('education_level')=="Bachelor's Degree" ? 'selected' : '' }}>Bachelor's Degree</option>
                                        <option value="Undergraduate / Licentiate Degree" {{ old('education_level')=='Undergraduate / Licentiate Degree' ? 'selected' : '' }}>Undergraduate / Licentiate Degree</option>
                                        <option value="Master's Degree" {{ old('education_level')=="Master's Degree" ? 'selected' : '' }}>Master's Degree</option>
                                        <option value="Doctorate (PhD)" {{ old('education_level')=='Doctorate (PhD)' ? 'selected' : '' }}>Doctorate (PhD)</option>
                                        <option value="Post-doctorate" {{ old('education_level')=='Post-doctorate' ? 'selected' : '' }}>Post-doctorate</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Other Qualifications (Post-graduations, languages, computer skills, etc.)</label>
                                    <textarea name="other_qualifications" class="form-control" rows="2">{{ old('other_qualifications') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Section 3: Employment Status -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">3. Employment Status</h5>
                            
                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label">Current Employment Status</label>
                                    <select name="employment_status" class="form-control">
                                        <option value="">Select employment status</option>
                                        <option value="Employed (working for an employer)" {{ old('employment_status')=='Employed (working for an employer)' ? 'selected' : '' }}>Employed (working for an employer)</option>
                                        <option value="Self-employed" {{ old('employment_status')=='Self-employed' ? 'selected' : '' }}>Self-employed</option>
                                        <option value="Unemployed, looking for the first job" {{ old('employment_status')=='Unemployed, looking for the first job' ? 'selected' : '' }}>Unemployed, looking for the first job</option>
                                        <option value="Unemployed, looking for a new job – Long-term unemployed (DLD)" {{ old('employment_status')=='Unemployed, looking for a new job – Long-term unemployed (DLD)' ? 'selected' : '' }}>Unemployed, looking for a new job – Long-term unemployed (DLD)</option>
                                        <option value="Unemployed, looking for a new job – Not DLD" {{ old('employment_status')=='Unemployed, looking for a new job – Not DLD' ? 'selected' : '' }}>Unemployed, looking for a new job – Not DLD</option>
                                        <option value="Inactive – Attending an educational or training course" {{ old('employment_status')=='Inactive – Attending an educational or training course' ? 'selected' : '' }}>Inactive – Attending an educational or training course</option>
                                        <option value="Inactive – Other" {{ old('employment_status')=='Inactive – Other' ? 'selected' : '' }}>Inactive – Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Professional Training in Past 2 Years?</label>
                                    <div class="form-check mt-2">
                                        <input type="checkbox" name="attended_training_courses" value="1" id="training_check" class="form-check-input" {{ old('attended_training_courses') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="training_check">Yes, I have attended training courses</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">If yes, describe (course name, hours, co-funded or private)</label>
                                    <textarea name="professional_training" class="form-control" rows="2">{{ old('professional_training') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Section 4: Desired Course -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">4. Desired Course</h5>
                            
                            <div class="row g-3 mt-2">
                                <div class="col-12">
                                    <label class="form-label">Desired Course</label>
                                    <input type="text" name="desired_course" value="{{ old('desired_course') }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Section 5: Consent & Agreements -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">5. Consent & Agreements</h5>
                            
                            <div class="mt-3 mb-3 p-3 bg-light rounded">
                                <p class="small text-muted mb-3">
                                    <strong>ATTENTION:</strong> The data collected is for exclusive use by the Pedagogical Department of Consulnear – Consulting and Training, Lda., 
                                    in accordance with Law 58/2019 of August 9.
                                </p>
                            </div>
                            
                            <div class="form-check mb-3">
                                <input type="checkbox" name="training_regulations_accepted" value="1" id="regulations" class="form-check-input" {{ old('training_regulations_accepted') ? 'checked' : '' }} required>
                                <label class="form-check-label" for="regulations">
                                    I have received and acknowledge the Training Regulations *
                                </label>
                                @error('training_regulations_accepted')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            
                            <div class="form-check">
                                <input type="checkbox" name="personal_data_disclosure_authorized" value="1" id="disclosure" class="form-check-input" {{ old('personal_data_disclosure_authorized') ? 'checked' : '' }} required>
                                <label class="form-check-label" for="disclosure">
                                    I authorize the disclosure of my personal data (identification, address, and contact details) for the purpose of possible surveys under DGERT monitoring procedures *
                                </label>
                                @error('personal_data_disclosure_authorized')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
