<?php
namespace Scs\Entity;

use Ng\Core\Entity\Entity;
use Ng\Core\Managers\StringManager;

class MembersEntity extends Entity
{
    public function getQrcodeUrl()
    {
        $this->qrcodeUrl = "/qrcodes/{$this->id}.png";
        return $this->qrcodeUrl;
    }

    public function getPdfUrl()
    {
        $this->pdfUrl = "/pdf-card/{$this->id}";
        return $this->pdfUrl;
    }

    public function getEditUrl()
    {
        $this->editUrl = "/edit/{$this->id}";
        return $this->editUrl;
    }

    public function getShortDesc()
    {
        $this->shortDesc = StringManager::truncateText($this->description, 150);
        return $this->shortDesc;
    }
}
