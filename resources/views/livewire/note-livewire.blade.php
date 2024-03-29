<div>
    <div class="mx-5">
    <div class="input-group">
        
        <input class="form-control" id="searchInput" placeholder="Search Notes" type="text" wire:model.live="word"
           >
           <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
    </div>
</div><br>

    <div class="container">
        <div class="tab-pane fade show active" id="navpills-1">
            <div class="row dz-scroll  loadmore-content searchable-items list" id="allContactListContent">
                @forelse ($notes as $data)
                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
                        <div >
                            <div class="card contact-bx item-content shadow border">
                            <div class="card-header border-0">
                                <div class="action-dropdown">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                    stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                                <path
                                                    d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                    stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                                <path
                                                    d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                    stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            {{-- <a class="dropdown-item edit" href="javascript:void(0);">Edit</a> --}}
                                            <a class="dropdown-item delete" href="{{url('admin/notes')}}/{{$data->id}}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body user-profile">

                                <div class="media-body user-meta-info">
                                    <h6 class="fs-20 font-w500 my-1"><a href="#" class="text-black user-name"
                                            data-name="{{ $data->title }}">{{ $data->title }}</a>
                                    </h6>
                                    <p class="mb-3  text-dark" data-occupation="{!! $data->note !!}">
                                        {!! $data->note !!}</p>

                                </div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                @empty

                    <img src="{{ url('assets/img/Empty-rafiki.png') }}" class="img-fluid d-block mx-auto"
                        style="max-width: 300px" />
                @endforelse
            </div>
        </div>
    </div>
</div>
