<div class="card-footer bg-transparent">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('icons/clock.svg') }}" alt="">
            <div style="margin-left: 5px">{{ $project->created_at->diffForHumans() }}</div>
        </div>
        <div class="d-flex align-items-center">
            <img src="{{ asset('icons/list-check.svg') }}">
            <div class="mr-2">
                {{ count($project->tasks) }}
            </div>
        </div>
        <div class="d-flex align-items-center ml-auto">
            <form action="/projects/{{ $project->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-light btn-sm">
                    <img src="{{ asset('icons/trash.svg') }}" alt="">
                </button>

            </form>
        </div>
    </div>
</div>
