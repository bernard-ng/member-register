<?php
namespace Scs\Models;

use Ng\Core\Models\Model;

class MembersModel extends Model
{

    protected $table = "members";

    /*
     * permet de faire une recherche selon l'option donnee
     * begin    :   vas chercher du contenu commencant par $query
     * end      :   vas chercher du contenu finissant par $query
     * within   :   vas chercher du contenu contenant dans le titre la $query
     * concat   :   vase Chercher du contenu contenant dans le titre et le contenu la $query
     * @param string $query
     * @param string $option l'option de la rechercher
    */
    public function search(string $query, string $option = "begin")
    {
        $query = addslashes(htmlentities($query));

        switch ($option) :
            case "begin":
                return $this->query(
                    "SELECT * FROM {$this->table} WHERE nom LIKE ? ",
                    ["{$query}%"],
                    true,
                    false
                );
                break;

            case "end":
                return $this->query(
                    "SELECT * FROM {$this->table} WHERE nom LIKE ? ",
                    ["%{$query}"],
                    true,
                    false
                );
                break;

            case "within":
                return $this->query(
                    "SELECT * FROM {$this->table} WHERE nom LIKE ?",
                    ["%{$query}%"],
                    true,
                    false
                );
                break;

            case "concat":
                return $this->query(
                    "SELECT * FROM {$this->table} WHERE CONCAT(nom,second_nom,type) LIKE ? ",
                    ["%{$query}%"],
                    true,
                    false
                );
                break;

            default:
                return null;
        endswitch;
    }
}
