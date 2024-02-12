<?php 

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}