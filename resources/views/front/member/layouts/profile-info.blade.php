<div class="col-md-3">
    <div class="card mb-4">
        <div class="card-body text-center">
            <div class="profile-pic mb-3 mt-3">
            
            <div class="tw-flex tw-flex-col tw-items-center">
            
                @php
                    $status = auth()->user()?->kandidat->pendaftaran->status;
                    $bgColor = $status === 'Verifikasi' ? 'green-500' : ($status === 'Pending' ? 'red-400' : 'tw-bg-gray-500');
                @endphp
                <img src="{{ memberProfileImg(auth()->user()) }}" onerror="this.src='{{ asset('member-template/images/profile/user-1.jpg') }}'" width="120" height="120" class="rounded-circle tw-mx-auto tw-border-[3px] tw-border-{{$bgColor}}" alt="user" style="object-fit:cover;object-position: center;">
                <span class="tw-mt-2 tw-inline-block  tw-text-white tw-text-xs tw-font-semibold tw-py-1 tw-px-3 tw-rounded-full tw-bg-{{$bgColor}} ">
                @if ($status === 'Verifikasi')
                    Terverifikasi
                    
                @else
                    Pending
                @endif    
            </span>
            </div>


                 
                <h4 class="mt-3 mb-0">{{ auth()->user()->name }}</h4>
                <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                <a href="{{ route('member.profile.edit') }}" class="w-75 btn btn-rounded btn-light-secondary text-primary btn-lg mt-4">
                    <i class="ti ti-pencil-minus ms-2 fs-5"></i>
                    Edit Profil
                </a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body py-4 px-3">
            <h6 class="text-primary fw-7">
                Status Finish Contract
                <a href="{{ route('member.jobs.applied') }}" class="btn btn-primary btn-sm btn-light-secondary float-end text-primary mt-n2"><i class="ti ti-external-link fs-4"></i></a>
            </h6>
            <div class="list-group mt-3 sidebar-work-experience-list">
            @forelse ($job_completed as $jobCompleted)
            <a href="{{ route('member.jobs.applied.show', hashId($jobCompleted->id))}}" class="list-group-item border-0 px-0" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-7">
                                {{ $jobCompleted->job?->nama_job }}
                            </h6>
                            <a href="{{ route('member.jobs.applied.show', hashId($jobCompleted->id)) }}"><small class="text-muted">View</small></a>
                        </div>
                    </a>
            @empty
                
            @endforelse
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body py-4 px-3">
            <h6 class="text-primary fw-7">
                Status Pekerjaan yg Dilamar
                <a href="{{ route('member.status.index') }}" class="btn btn-primary btn-sm btn-light-secondary float-end text-primary mt-n2"><i class="ti ti-external-link fs-4"></i></a>
            </h6>
            <div class="list-group mt-3">
                @forelse ($recent_applied_jobs as $appliedJob)
                    <a href="{{ route('member.jobs.applied.show', hashId($appliedJob->id))}}" class="list-group-item border-0 px-0" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-7">
                                {{ $appliedJob->job?->nama_job }}
                            </h6>
                            <a href="{{ route('member.jobs.applied.show', hashId($appliedJob->id)) }}"><small class="text-muted">{{$appliedJob->status}}</small></a>
                        </div>
                    </a>
                @empty
                    <div class="text-center my-2">No data</div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="text-center mb-4">
        <a href="{{route('preview-cv', hashId(auth()->user()?->kandidat->id))}}" target="_blank" class="btn btn-primary w-100" >
            Preview CV
            <i class="ms-2 ti ti-external-link"></i>
        </a>
      
    </div>
</div>