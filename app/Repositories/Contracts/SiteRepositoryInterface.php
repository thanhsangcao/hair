<?php
namespace App\Repositories\Contracts;

interface SiteRepositoryInterface
{
    public function create();
    public function store($input);
    public function getStylist($id);
    public function getTimeSheet($id);
}
