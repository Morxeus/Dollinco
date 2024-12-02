<?php

namespace App\Livewire\Forms;

use App\Models\EstadoPeriodo;
use Livewire\Form;

class EstadoPeriodoForm extends Form
{
    public ?EstadoPeriodo $estadoPeriodoModel;
    
    public $IDPeriodoE = '';
    public $NombreEstado = '';

    public function rules(): array
    {
        return [
			'IDPeriodoE' => 'required',
			'NombreEstado' => 'required|string',
        ];
    }

    public function setEstadoPeriodoModel(EstadoPeriodo $estadoPeriodoModel): void
    {
        $this->estadoPeriodoModel = $estadoPeriodoModel;
        
        $this->IDPeriodoE = $this->estadoPeriodoModel->IDPeriodoE;
        $this->NombreEstado = $this->estadoPeriodoModel->NombreEstado;
    }

    public function store(): void
    {
        $this->estadoPeriodoModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->estadoPeriodoModel->update($this->validate());

        $this->reset();
    }
}
