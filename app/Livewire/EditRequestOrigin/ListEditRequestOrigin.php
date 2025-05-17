<?php

namespace App\Livewire\EditRequestOrigin;

use App\Enums\EditRequestOriginStatus;
use App\Models\EditRequestOrigin;
use App\Models\LockedOrigin;
use App\Traits\SortSearchTrait;
use App\Traits\WithNotify;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ListEditRequestOrigin extends Component
{
    use WithNotify, SortSearchTrait, WithPagination;

    public array $filters = [
        'search' => '',
        'status' => EditRequestOriginStatus::Pending->value,
    ];

    public array $sort = [
        'by' => 'id',
        'asc' => false,
    ];

    public function sortByField($field)
    {
        if ($field == $this->sort['by']) {
            $this->sort['asc'] = !$this->sort['asc'];
        }
        $this->sort['by'] = $field;
        $this->resetPage();
    }

    private array $relations = ['origin', 'user'];

    protected $queryString = [
        'filters',
    ];

    public function approve($requestId)
    {
        $request = EditRequestOrigin::findOrFail($requestId);
        if ($request->status->value == EditRequestOriginStatus::Approved->value) {
            $this->infoNotify(__('site.edit_request_is_already_approved'));
            return;
        }
        $request->update(['status' =>  EditRequestOriginStatus::Approved->value]);
        LockedOrigin::where('origin_id', $request->origin_id)->delete();
        $this->successNotify(__('site.edit_request_is_approved_success'));
    }

    public function reject($requestId)
    {
        $request = EditRequestOrigin::findOrFail($requestId);
        if ($request->status->value == EditRequestOriginStatus::Rejected->value) {
            $this->infoNotify(__('site.edit_request_is_already_rejected'));
            return;
        }
        $request->update(['status' =>  EditRequestOriginStatus::Rejected->value]);
        $this->successNotify(__('site.edit_request_is_rejected_success'));
    }

    public function render()
    {
        $this->authorize('view-edit-request-origin');

        $requests = EditRequestOrigin::with($this->relations)
            ->search($this->filters['search'])
            ->filterByStatus($this->filters['status'])
            ->orderBy($this->sort['by'], $this->sort['asc'] ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        return view('livewire.edit-request-origin.list-edit-request-origin', [
            'requests' => $requests,
            'count_all' => EditRequestOrigin::count(),
        ]);
    }
}
