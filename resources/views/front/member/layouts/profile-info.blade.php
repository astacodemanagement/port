<div class="col-md-3">
    <div class="card mb-4">
        <div class="card-body text-center">
            <div class="profile-pic mb-3 mt-3">
                <img src="{{ memberProfileImg(auth()->user()) }}" onerror="this.src='{{ asset('member-template/images/profile/user-1.jpg') }}'" width="120" height="120" class="rounded-circle" alt="user" style="object-fit:cover;object-position: center;">
                <h4 class="mt-3 mb-0">{{ auth()->user()->name }}</h4>
                <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                <a href="{{ route('member.profile.edit') }}" class="w-75 btn btn-rounded btn-light-secondary text-primary btn-lg mt-4">
                    <i class="ti ti-pencil-minus ms-2 fs-5"></i>
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body py-4 px-3">
            <h6 class="text-primary fw-7">
                Work Experience
                <a href="{{ route('member.work-experience.edit') }}" class="btn btn-primary btn-sm btn-light-secondary float-end text-primary mt-n2"><i class="ti ti-pencil-minus fs-4"></i></a>
            </h6>
            <div class="list-group mt-3">
                @forelse ($work_experiences as $we)
                    @php
                        $dateDiffYear = \Carbon\Carbon::parse($we->tanggal_mulai_kerja)->diffInYears($we->tanggal_selesai_kerja);
                        $dateDiffMonth = \Carbon\Carbon::parse($we->tanggal_mulai_kerja)->diffInMonths($we->tanggal_selesai_kerja);
                    @endphp
                    <a href="#" class="list-group-item border-0 px-0" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-7">{{ $we->posisi }}</h6>
                            <small class="text-muted">{{ $dateDiffYear > 0 ? $dateDiffYear . ' years' : $dateDiffMonth . ' months' }}</small>
                        </div>
                        <p class="mb-1">
                            {{ $we->nama_perusahaan }}
                        </p>
                    </a>
                @empty
                    <div class="text-center my-2">No data</div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body py-4 px-3">
            <h6 class="text-primary fw-7">
                Recent Applied Jobs
                <a href="{{ route('member.jobs.index') }}" class="btn btn-primary btn-sm btn-light-secondary float-end text-primary mt-n2"><i class="ti ti-external-link fs-4"></i></a>
            </h6>
            <div class="list-group mt-3">
                @forelse ($recent_applied_jobs as $raj)
                    <a href="#" class="list-group-item border-0 px-0" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-7">
                                Senior Web Developer
                            </h6>
                            <small class="text-muted">View</small>
                        </div>
                    </a>
                @empty
                    <div class="text-center my-2">No data</div>
                @endforelse
            </div>
        </div>
    </div>
    
    <div class="text-center mb-4">
        <button class="btn btn-primary w-100">
            Preview CV
            <i class="ms-2 ti ti-external-link"></i>
        </button>
        <button class="btn btn-warning text-dark mt-2 w-100">
            Download CV
            <i class="ms-2 ti ti-download"></i>
        </button>
    </div>
</div>