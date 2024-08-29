<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VisitorDetail extends Component
{
    public $view_visitor_id, $view_visitor_security, $view_visitor_name, $view_visitor_image, $view_visitor_email, $view_visitor_guest, $view_visitor_idCard, $view_visitor_police, $view_visitor_company, $view_visitor_meet, $view_visitor_purpose, $view_visitor_info, $view_visitor_status;
    protected $listeners = [
        'detailVisitor' => 'viewVisitor'
    ];

    public function render()
    {
        return view('livewire.visitor-detail');
    }
    public function viewVisitor($visitorDetail)
    {
        $this->view_visitor_id = $visitorDetail['id'];
        $this->view_visitor_security = $visitorDetail['security'];
        $this->view_visitor_name = $visitorDetail['name'];
        $this->view_visitor_image = $visitorDetail['photo'];
        $this->view_visitor_email = $visitorDetail['email'];
        $this->view_visitor_guest = $visitorDetail['guest'];
        $this->view_visitor_idCard = $visitorDetail['idCard'];
        $this->view_visitor_police = $visitorDetail['police'];
        $this->view_visitor_company = $visitorDetail['company'];
        $this->view_visitor_meet = $visitorDetail['meet'];
        $this->view_visitor_purpose = $visitorDetail['purpose'];
        $this->view_visitor_info = $visitorDetail['info'];
        $this->view_visitor_status = $visitorDetail['status'];
    }

    public function closeViewVisitorModal()
    {
        $this->view_visitor_id = '';
        $this->view_visitor_security = '';
        $this->view_visitor_name = '';
        $this->view_visitor_image = '';
        $this->view_visitor_email = '';
        $this->view_visitor_guest = '';
        $this->view_visitor_idCard = '';
        $this->view_visitor_police = '';
        $this->view_visitor_company = '';
        $this->view_visitor_meet = '';
        $this->view_visitor_purpose = '';
        $this->view_visitor_info = '';
        $this->view_visitor_status = '';
    }
}
