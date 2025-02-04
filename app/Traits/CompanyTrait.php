<?php

namespace App\Traits;

use App\Models\Company;
use Livewire\WithPagination;

trait CompanyTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Company $company;

    public $company_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:companies,name,' . $this->company_id,
        ];
    }

    public function setCompany($id)
    {
        $this->company = Company::findOrFail($id);
        $this->company_id = $this->company->id;
        $this->name = $this->company->name;
    }

    public function storeCompany()
    {
        $validated = $this->validate();
        Company::create($validated);
        $this->dispatch('refresh-list-company');
        $this->successNotify(__('site.company_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateCompany()
    {
        $validated = $this->validate();
        $this->company->update($validated);
        $this->dispatch('refresh-list-company');
        $this->successNotify(__('site.company_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteCompany($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        $this->dispatch('refresh-list-company');
        $this->successNotify(__('site.company_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteCompany($arr)
    {
        $companys = Company::whereIn('id', $arr);
        $companys->delete();
        $this->dispatch('refresh-list-company');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.company_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
