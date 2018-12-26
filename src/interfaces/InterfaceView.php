<?php

namespace Src\Interfaces;

Interface InterfaceView{
	public function setDir($Dir);
    public function setTitle($Title);
    public function setDescription($Description);
    public function setKeywords($Keywords);
    public function renderLayout();
}