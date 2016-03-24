<?php

if (isset($_SESSION['pseudo']))
{
include_once('model/panel.class.php');
$aff = "";
Class ControlPanel
{
	public $panel;
	public $aff;
	public $aff_billet;
	public $aff_com;

	public function __construct()
	{
		$this->panel = new Panel();
	}	

	public function panel_membre()
	{
		$_panel_aff = "";
		$_panel_aff .= "<tr>";
        $_panel_aff .= '<th scope="col">ID</th>';
        $_panel_aff .= '<th scope="col">LOGIN</th>';
        $_panel_aff .= '<th scope="col">EMAIL</th>';
        $_panel_aff .= '<th scope="col">DATE D\'INSCRIPTION</th>';
        $_panel_aff .= '<th scope="col">SEXE</th>';
        $_panel_aff .= '<th scope="col">RANG</th>';
        $_panel_aff .= '<th></th>';
        $_panel_aff .= '<th></th>';
        $_panel_aff .= '</tr>';
        return $_panel_aff;
	}

	public function panel_article()
	{
		$_panel_aff = "";
		$_panel_aff .= '<tr>';
        $_panel_aff .= '<th scope="col">ID</th>';
        $_panel_aff .= '<th scope="col">Created</th>';
        $_panel_aff .= '<th scope="col">Updated</th>';
        $_panel_aff .= '<th scope="col">Title</th>';
        $_panel_aff .= '<th scope="col">Content</th>';
        $_panel_aff .= '<th></th>';
        $_panel_aff .= '<th></th>';
        $_panel_aff .= '</tr>';
        return $_panel_aff;
	}

	public function panel_com()
	{
		$_panel_aff = "";
		$_panel_aff .= '<tr>';
        $_panel_aff .= '<th scope="col">ID</th>';
        $_panel_aff .= '<th scope="col">Numero Article</th>';
        $_panel_aff .= '<th scope="col">Login</th>';
        $_panel_aff .= '<th scope="col">Content</th>';
        $_panel_aff .= '<th scope="col">Date</th>';
        $_panel_aff .= '<th></th>';
        $_panel_aff .= '<th></th>';
        $_panel_aff .= '</tr>';
        return $_panel_aff;
	}

	public function aff_membre()
	{
		$membre = $this->panel->membre();
		foreach ($membre as $key => $value)
		{
			$this->aff .= '<tr>';
			$this->aff .= '<td>'. $value['id_user'] .'</td>';
			$this->aff .= '<td>'. $value['login'] .'</td>';
			$this->aff .= '<td>'. $value['email'] .'</td>';
			$this->aff .= '<td>'. $value['date_inscription'] .'</td>';
			$this->aff .= '<td>'. $value['sexe'] .'</td>';
			$this->aff .= '<td>'. $value['Rang'] .'</td>';
			$this->aff .= '<td> <input class="modif" type="image" src="../images/para.png" alt="Modifier" name="modif"/></td>';
			$this->aff .= '<td> <input class="del" type="image" src="../images/croix.png" alt="Supprimer" name="del" /></td>';
			$this->aff .= '</tr>';
		}
		return $this->aff;
	}

	public function aff_billet()
	{
		$billet = $this->panel->billet();
		foreach ($billet as $key => $value)
		{
			$before_cut = $value['content'];
			$cut = substr($before_cut, 0,50);
			$cut .= " ...";

			$this->aff_billet .= '<tr>';
			$this->aff_billet .= '<td>'. $value['id_billet'] .'</td>';
			$this->aff_billet .= '<td>'. $value['created'] .'</td>';
			$this->aff_billet .= '<td>'. $value['updated'] .'</td>';
			$this->aff_billet .= '<td>'. $value['title'] .'</td>';
			$this->aff_billet .= '<td>'. $cut .'</td>';
			$this->aff_billet .= '<td> <input class="modif_billet" type="image" src="../images/para.png" alt="Modifier" name="modif"/></td>';
			$this->aff_billet .= '<td> <input class="del_billet" type="image" src="../images/croix.png" alt="Supprimer" name="del" /></td>';
			$this->aff_billet .= '</tr>';
		}

		return $this->aff_billet;
	}

	public function aff_com()
	{
		$com = $this->panel->com();
		foreach ($com as $key => $value)
		{
			$before_cut = $value['content'];
			$cut = substr($before_cut, 0,50);
			$cut .= " ...";

			$this->aff_com .= '<tr>';
			$this->aff_com .= '<td>'. $value['id'] .'</td>';
			$this->aff_com .= '<td>'. $value['id_billet'] .'</td>';
			$this->aff_com .= '<td>'. $value['login'] .'</td>';
			$this->aff_com .= '<td>'. $cut .'</td>';
			$this->aff_com .= '<td>'. $value['date'] .'</td>';
			$this->aff_com .= '<td> <input class="modif_com" type="image" src="../images/para.png" alt="Modifier" name="modif"/></td>';
			$this->aff_com .= '<td> <input class="del_com" type="image" src="../images/croix.png" alt="Supprimer" name="del" /></td>';
			$this->aff_com .= '</tr>';
		}

		return $this->aff_com;
	}

	public function modif()
	{
		if (isset($_POST['id']) && isset($_POST['login']) && isset($_POST['email']) && 
			isset($_POST['date']) && isset($_POST['f_or_m']) && isset($_POST['users']))
		{
			$membre = $this->panel->update_user();
			header('Location: ./admin');
		}
	}

	public function delete()
	{
		if (isset($_POST['del']))
		{
			$del = $this->panel->delete_user();
		}
		elseif (isset($_POST['del_billet']))
		{
			$del = $this->panel->delete_billet();
		}
		elseif (isset($_POST['del_com']))
		{
			$del = $this->panel->delete_com();
		}
	}

	public function aff_article_blog()
	{
		$billet = $this->panel->billet_blog();
		foreach ($billet as $key => $value)
		{
			$before_cut = $value['content'];
			$cut = substr($before_cut, 0,50);
			$cut .= " ...";

			$this->aff_billet .= '<tr>';
			$this->aff_billet .= '<td>'. $value['id_billet'] .'</td>';
			$this->aff_billet .= '<td>'. $value['created'] .'</td>';
			$this->aff_billet .= '<td>'. $value['updated'] .'</td>';
			$this->aff_billet .= '<td>'. $value['title'] .'</td>';
			$this->aff_billet .= '<td>'. $cut .'</td>';
			$this->aff_billet .= '<td> <input class="modif_billet" type="image" src="../images/para.png" alt="Modifier" name="modif"/></td>';
			$this->aff_billet .= '<td> <input class="del_billet" type="image" src="../images/croix.png" alt="Supprimer" name="del" /></td>';
			$this->aff_billet .= '</tr>';
		}
		if(is_null($this->aff_billet))
		{
			$this->aff_com .= '<tr>';
			$this->aff_com = '<td id="center_td" colspan="7">Vous n\'avez pas écrit d\'article ou il on tous ete supprimer</td>';
			$this->aff_com .= '</tr>';
		}

		return $this->aff_billet;
	}

	public function aff_com_blog()
	{
		$com = $this->panel->com_blog();
		foreach ($com as $key => $value)
		{
			$before_cut = $value['content'];
			$cut = substr($before_cut, 0,50);
			$cut .= " ...";

			$this->aff_com .= '<tr>';
			$this->aff_com .= '<td>'. $value['id'] .'</td>';
			$this->aff_com .= '<td>'. $value['id_billet'] .'</td>';
			$this->aff_com .= '<td>'. $value['login'] .'</td>';
			$this->aff_com .= '<td>'. $cut .'</td>';
			$this->aff_com .= '<td>'. $value['date'] .'</td>';
			$this->aff_com .= '<td> <input class="modif_com" type="image" src="../images/para.png" alt="Modifier" name="modif"/></td>';
			$this->aff_com .= '<td> <input class="del_com" type="image" src="../images/croix.png" alt="Supprimer" name="del" /></td>';
			$this->aff_com .= '</tr>';
		}
		if(is_null($this->aff_com))
		{
			$this->aff_com .= '<tr>';
			$this->aff_com = '<td id="center_td" colspan="7">Vous n\'avez pas de commentaire ou il on tous ete supprimer</td>';
			$this->aff_com .= '</tr>';
		}

		return $this->aff_com;
	}

	public function aff_com_user()
	{
		$com = $this->panel->com_user();
		foreach ($com as $key => $value)
		{
			$before_cut = $value['content'];
			$cut = substr($before_cut, 0,50);
			$cut .= " ...";

			$this->aff_com .= '<tr>';
			$this->aff_com .= '<td>'. $value['id'] .'</td>';
			$this->aff_com .= '<td>'. $value['id_billet'] .'</td>';
			$this->aff_com .= '<td>'. $value['login'] .'</td>';
			$this->aff_com .= '<td>'. $cut .'</td>';
			$this->aff_com .= '<td>'. $value['date'] .'</td>';
			$this->aff_com .= '<td> <input class="modif_com" type="image" src="../images/para.png" alt="Modifier" name="modif"/></td>';
			$this->aff_com .= '<td> <input class="del_com" type="image" src="../images/croix.png" alt="Supprimer" name="del" /></td>';
			$this->aff_com .= '</tr>';
		}
		if(is_null($this->aff_com))
		{
			$this->aff_com .= '<tr>';
			$this->aff_com = '<td id="center_td" colspan="7">Vous n\'avez pas de commentaire ou il on tous ete supprimer</td>';
			$this->aff_com .= '</tr>';
		}

		return $this->aff_com;
	}
}

try
{
    $new = new ControlPanel();
    $aff = "";
	$aff_billet = "";
	$panel_membre = "";
	$panel_article = "";
    if ($_SESSION['level'] == 1)
	{		
	    $panel_membre = $new->panel_membre();
	    $panel_article = $new->panel_article();
	    $panel_com = $new->panel_com();
	    $aff = $new->aff_membre();
	    $aff_billet = $new->aff_billet();
	    $aff_com = $new->aff_com();
	    $new->modif();
	    $new->delete();
	}
	elseif ($_SESSION['level'] == 2)
	{
		$panel_article = $new->panel_article();
	    $panel_com = $new->panel_com();
		$aff_billet = $new->aff_article_blog();
		$aff_com = $new->aff_com_blog();
		$new->modif();
	    $new->delete();
	}
	elseif ($_SESSION['level'] == 3)
	{
		$panel_com = $new->panel_com();
		$aff_com = $new->aff_com_user();
		$new->modif();
	    $new->delete();
	}


} 
catch (Exception $e)
{
    echo $e->getMessage(), "\n";
}
include_once('view/panel.php');
}
else
{
	header('Location: ./connexion');
}
?>