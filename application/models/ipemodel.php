<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Ipemodel extends CI_Model {
	function __construct() {
		$this -> load -> database();
	}

	function searchUsers($users) {
		//$no1 = substr($users, 0, 3);
		//$no2 = substr($users, -3, 3);		
		//return $this -> db -> query("SELECT * FROM users WHERE username LIKE '%$users%' OR id=$no1$no2") -> result();
		$no=0;
		if(substr($users, 0, 3)=='ipe'){
			$no=substr($users, 3)-3000;
		}		
		return $this -> db -> query("SELECT * FROM users WHERE username LIKE '%$users%' OR id='$no'") -> result();
	}

	function searchSpecialIDS($users) {
		return $this -> db -> query("SELECT * FROM users WHERE id=$users") -> result();
	}

	function searchPictures($users) {
		return $this -> db -> query("SELECT * FROM pictures WHERE title LIKE '%$users%' OR description LIKE '%$users%'") -> result();
	}

	function searchTags($tag) {
		return $this -> db -> query("SELECT p.* FROM pictures p, tags_pictures tp, tags t WHERE t.name LIKE '%$tag%' AND tp.tid=t.id AND p.id=tp.pid") -> result();
	}

	function add_friend($f1, $f2) {
		$data1 = array('friend1' => $f1, 'friend2' => $f2);
		if ($this -> db -> insert("friends", $data1))
			return true;
		else
			return false;
	}

	function confirmfriend($f1, $f2) {
		$this -> db -> query("UPDATE friends SET confirmed=1 WHERE friend2=$f1 AND friend1=$f2");
	}

	function rejectfriend($f1, $f2) {
		$this -> db -> query("DELETE FROM friends WHERE friend2=$f1 AND friend1=$f2");
	}

	function confirmTestimonials($f1, $f2) {
		$this -> db -> query("DELETE FROM testimonial WHERE uid2=$f1 AND uid1=$f2");
	}

	function rejectTestimonials($f1, $f2) {
		$this -> db -> query("UPDATE testimonial SET confirm=1 WHERE uid2=$f1 AND uid1=$f2");
	}

	function addContact($id, $contact) {
		$this -> db -> query("UPDATE users SET contact='$contact' WHERE id=$id");
	}

	function addFacebook($id, $link) {
		$this -> db -> query("UPDATE users SET facebook='$link' WHERE id=$id");
	}

	function addTwitter($id, $link) {
		$this -> db -> query("UPDATE users SET twitter='$link' WHERE id=$id");
	}

	function addSite($id, $link) {
		$this -> db -> query("UPDATE users SET website='$link' WHERE id=$id");
	}

	function addEmail($id, $link) {
		$this -> db -> query("UPDATE users SET email='$link' WHERE id=$id");
	}

	function deleteComment($id) {
		$this -> db -> query("DELETE FROM comments WHERE id=$id");
	}

	function addTestimonial($uid, $uid1, $testimonial) {
		$data1 = array('uid' => $uid, 'uid2' => $uid1, 'testimonial' => $testimonial);
		if ($this -> db -> insert("testimonial", $data1))
			return true;
		else
			return false;
	}

	function getUnConfirmedTestimonials($uid) {
		return $this -> db -> query("SELECT *  FROM testimonial,users WHERE uid=$uid AND confirm=0 AND users.id=testimonial.uid2") -> result();
	}

	function add_user($user, $pass, $email, $state, $city) {
		$data1 = array('username' => $user, 'password' => $pass, 'email' => $email, 'state' => $state, 'city' => $city);

		if ($this -> db -> insert("users", $data1))
			return true;
		else
			return false;
	}

	function addAd($item, $uid, $prangeUpper, $message, $category, $contact = NULL, $location = NULL, $loc = NULL) {
		$data1 = array('item' => $item, 'uid' => $uid, 'pricerange' => $prangeUpper, 'message' => $message, 'tagsList' => '', 'contactno' => $contact, 'location' => $location, 'pic_loc' => $loc, 'category' => $category);
		$this -> db -> insert('buysell', $data1);
		$id = $this -> db -> query("SELECT * FROM buysell ORDER BY timestamp DESC") -> first_row() -> id;
		$this -> addFeed(3, $id, $uid);
		return $id;
	}

	function validUsername($username) {
		$v = $this -> db -> query("SELECT * FROM users WHERE username='$username'") -> num_rows();
		if ($v > 0)
			return false;
		else
			return true;
	}

	function validEmail($email) {
		$v = $this -> db -> query("SELECT * FROM users WHERE email='$email'") -> num_rows();
		if ($v > 0)
			return false;
		else
			return true;
	}

	function addTag($tag) {
		$res = $this -> db -> query("SELECT * FROM buyselltags WHERE name='$tag'");
		if ($res -> num_rows() == 0) {
			$data1 = array('name' => $tag, );
			$this -> db -> insert('buyselltags', $data1);
			return $this -> db -> query("SELECT * FROM buyselltags WHERE name='$tag'") -> first_row() -> id;
		} else
			$res -> first_row() -> id;
	}

	function addToThread($itemid, $amount, $message, $uid) {
		$data1 = array('item' => $itemid, 'amount' => $amount, 'message' => $message, 'uid' => $uid);
		$this -> db -> insert('buysellthread', $data1);
	}

	function addBio($id, $bio) {
		$this -> db -> query("UPDATE users SET bio='$bio' WHERE id=$id");
	}

	function addBasicProfile($id, $profileImage) {
		$this -> db -> query("UPDATE users SET  profileImage='$profileImage' WHERE id=$id");
	}

	function addUsername($id, $username) {
		$this -> db -> query("UPDATE users SET  username='$username' WHERE id=$id");
	}
	
	function editPicture($id, $uid, $title, $description, $category, $camera, $album) {
		$data1 = array('user_id' => $uid, 'Title' => $title, 'Description' => $description, 'category' => $category, 'camera' => $camera);

		$this->db->where('id', $id);
		if ($this -> db -> update("pictures", $data1)) {
			//$pid = $this -> db -> query("SELECT id FROM pictures WHERE location='$dfile_name'") -> first_row() -> id;
			$pid=$id;
			$data1 = array('album_id' => $album);
			if ($this -> db -> query("SELECT * FROM albums WHERE id=$album") -> first_row() -> cover_pic_id == 0) {
				$this -> db -> query("UPDATE albums SET cover_pic_id=$pid WHERE id=$album");
			}
			$this->db->where('picture_id', $pid);
			$this -> db -> update("album_pictures", $data1);
			//return $pid;
		} else
			echo $this -> db -> _error_message();
	}

	function addPicture($id, $title, $description, $dfile_name, $category, $camera, $album, $tagarray = array()) {
		$data1 = array('user_id' => $id, 'Title' => $title, 'Description' => $description, 'location' => $dfile_name, 'category' => $category, 'camera' => $camera);

		if ($this -> db -> insert("pictures", $data1)) {
			$pid = $this -> db -> query("SELECT id FROM pictures WHERE location='$dfile_name'") -> first_row() -> id;
			$data1 = array('picture_id' => $pid, 'album_id' => $album);
			if ($this -> db -> query("SELECT * FROM albums WHERE id=$album") -> first_row() -> cover_pic_id == 0) {
				$this -> db -> query("UPDATE albums SET cover_pic_id=$pid WHERE id=$album");
			}
			if ($this -> db -> insert("album_pictures", $data1)) {
				foreach ($tagarray as $val) {
					$tid = $this -> db -> query("SELECT id FROM tags WHERE name='$val'") -> first_row();
					if (empty($tid)) {
						$this -> db -> insert("tags", array('name' => $val));
						$tid = $this -> db -> query("SELECT id FROM tags WHERE name='$val'") -> first_row();
					}
					$data2 = array('pid' => $pid, 'tid' => $tid -> id);
					$this -> db -> insert("tags_pictures", $data2);
				}

				$this -> addFeed(2, $pid, $id);
				return $pid;
			} else
				return $pid;
		} else
			echo $this -> db -> _error_message();
		;
	}

	function addFollower($followerID, $id) {
		if (!$this -> isFollowing($followerID, $id)) {
			$data1 = array('follower' => $followerID, 'following' => $id, );

			if ($this -> db -> insert("follow", $data1)) {
				$fid = $this -> db -> query("SELECT * FROM follow WHERE follower=$followerID AND following=$id") -> first_row() -> id;
				$this -> addNotification(0, $fid, $id);
				//$this -> addNotification(0, $fid, $followerID);
				//$this -> addFeed(0, $fid, $followerID);
				return true;
			}

		}

		return false;
	}

	function search() {

	}

	function add_album($albumText, $id) {
		$data1 = array('name' => $albumText, 'uid' => $id);

		if ($this -> db -> insert("albums", $data1)) {
			return $this -> db -> query("SELECT id FROM albums ORDER BY time DESC") -> first_row() -> id;
		}
		return -1;
	}

	function addForumPost($uid, $title, $message, $categoryID, $replyID = NULL) {
		$data1 = array('uid' => $uid, 'title' => $title, 'message' => $message, 'replyid' => $replyID, 'category_id' => $categoryID, );
		$this -> db -> insert('forums', $data1);
		$postID = $this -> db -> query("SELECT * FROM forums ORDER BY timestamp DESC") -> first_row() -> id;

		if ($replyID != NULL) {
			$notificationUserArray = array();
			$res = $this -> db -> query("SELECT * FROM forums WHERE replyID=$replyID ORDER BY timestamp DESC") -> result();
			foreach ($res as $v) {
				if (!in_array($v -> uid, $notificationUserArray) && $v->uid!=$uid) {
					$notificationUserArray[] = $v -> uid;
				}
			}
			for ($i = 0; $i < count($notificationUserArray); $i++) {
				$this -> addNotification(1, $postID, $notificationUserArray[$i]);
			}
		} else {
			$this -> addFeed(1, $postID, $uid);
		}

		return $postID;
	}

	function addComment($uid, $pid, $comment, $replyTo) {
		$data1 = array('uid' => $uid, 'pid' => $pid, 'comment' => $comment, 'replyto' => $replyTo);

		$this -> db -> insert('comments', $data1);
		$note_id = $this -> db -> query("SELECT user_id FROM pictures WHERE id=$pid") -> first_row() -> user_id;

		if ($note_id != $uid)
			$this -> addNotification(2, $pid, $note_id);
	}

	function addMessage($uid1, $uid2, $message) {
		$data1 = array('uid1' => $uid1, 'uid2' => $uid2, 'message' => $message);
		$this -> db -> insert('messaging', $data1);

		$id = $this -> db -> query("SELECT * FROM messaging ORDER BY timestamp DESC") -> first_row() -> id;
		$this -> addNotification(3, $id, $uid2);
	}

	function searchBuySell($searchTerm, $model, $location, $priceUp, $priceDown) {
	
		return $this -> db -> query("SELECT buysell.*,users.username,users.profileImage
						FROM buysell,users
						WHERE users.id=buysell.uid
						AND category LIKE '%$searchTerm%'
						AND item LIKE '%$model%'
						AND pricerange >= '$priceDown'
						AND pricerange <= '$priceUp'
						AND buysell.location LIKE '%$location%'
						ORDER BY timestamp DESC") -> result();
		/*
		$pricerange = "";
		if ($priceUp != -1 && $priceUp != "")
			$pricerange .= "AND pricerange<$priceUp";
		if ($priceDown != -1 && $priceDown != "")
			$pricerange .= " AND pricerange>$priceDown";
		$loc = "";
		if ($location != "")
			$loc = "AND location=$location";
		$res = $this -> db -> query("SELECT buysell.*,users.username,users.profileImage FROM buysell,users WHERE users.id=buysell.uid AND ((item LIKE '%$searchTerm%' OR tagsList LIKE '%$searchTags%') OR message LIKE '%$searchTerm%') $pricerange $loc") -> result();
		$res2 = $this -> db -> query("SELECT buysell.*,users.username,users.profileImage FROM buysell,users WHERE users.id=buysell.uid AND (tagsList  LIKE '%$searchTerm%' OR tagsList LIKE '%$searchTags%') $pricerange $loc") -> result();

		foreach ($res2 as $val) {
			$present = FALSE;
			foreach ($res as $val1) {
				if ($val -> id == $val1 -> id) {
					$present = TRUE;
					break;
				}
			}
			if (!$present)
				$res[] = $val;
		}
		return $res;
		*/

	}

	function checkLogin($username, $password) {
		$returned = false;
		$no1 = substr($username, 3, 9);

		if (is_numeric($no1)) {
			$q = "SELECT * FROM users WHERE (username='$username' OR id=$no1 OR email='$username') AND password='$password'";
		} else {
			$q = "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'";
		}

		$res = $this -> db -> query($q);
		if ($res -> num_rows() >= 1)
			return $res -> first_row();
		return "";
	}

	function reportAbuse($pid) {
		$data1 = array('pid' => $pid, );
		$this -> db -> insert('reportabuse', $data1);
	}

	function getReportAbuse() {
		return $this -> db -> query("SELECT * FROM reportabuse r,pictures p ,users u WHERE r.pid=p.id AND p.user_id=u.id ORDER BY timestamp DESC") -> result();
	}

	function deleteReportAbuse($id) {
		$this -> db -> query("DELETE FROM reportabuse WHERE id=$id");
	}

	function deleteUser($u) {
		$this -> db -> query("DELETE FROM feed WHERE uid=$u");
		$this -> db -> query("DELETE FROM notifications WHERE uid=$u");
		
		$this -> db -> query("DELETE FROM comments WHERE uid=$u");
		$this -> db -> query("DELETE FROM stars WHERE uid=$u");
		
		$this -> db -> query("DELETE FROM album_pictures WHERE album_id IN (SELECT id FROM albums WHERE uid=$u)");
		$this -> db -> query("DELETE FROM pictures WHERE user_id=$u");
		$this -> db -> query("DELETE FROM albums WHERE uid=$u");
		
		$this -> db -> query("DELETE FROM messaging WHERE uid1=$u OR uid2=$u");
		
		$this -> db -> query("DELETE FROM follow WHERE follower=$u OR following=$u");
		$this -> db -> query("DELETE FROM friends WHERE friend1=$u OR friend2=$u");
		
		$this -> db -> query("DELETE FROM forums WHERE uid=$u");
		$this -> db -> query("DELETE FROM buysell WHERE uid=$u");
	
		$this -> db -> query("DELETE FROM testimonial WHERE uid=$u OR uid2=$u");
		$this -> db -> query("DELETE FROM users WHERE id=$u");
	}

	function isAdmin($uid) {
		return $this -> db -> query("SELECT admin FROM users WHERE id=$uid") -> first_row() -> admin;
	}

	function isOwnerOfPicture($pid, $uid) {
		if ($this -> db -> query("SELECT user_id FROM pictures WHERE id=$pid") -> first_row() -> user_id == $uid)
			return true;
		return false;
	}

	function getOwnerOfPicture($pid) {
		return $this -> db -> query("SELECT u.* FROM pictures p,users u WHERE u.id=p.user_id AND p.id=$pid") -> first_row();
		return true;
	}

	function isfollowable($id, $uid) {
		$res = $this -> db -> query("SELECT * FROM follow WHERE follower=$uid AND following=$id");
		if ($res -> num_rows() == 0)
			return TRUE;
		else
			return FALSE;
	}

	function isfriendable($id, $uid) {
		$res = $this -> db -> query("SELECT * FROM friends WHERE (friend1=$uid AND friend2=$id) OR (friend2=$uid AND friend1=$id)");
		if ($res -> num_rows() == 0)
			return TRUE;
		else
			return FALSE;
	}

	function removeFollower($uid, $id) {
		$this -> db -> query("DELETE FROM follow WHERE follower=$uid AND following=$id");
	}

	function getUserDetailsById($id) {
		return $this -> db -> query("SELECT * FROM users WHERE id=$id") -> first_row();
	}

	function getPicturesForUser($id, $timestamp, $limit = 30, $skip = 0, $rand = FALSE) {

		if ($limit != -1) {
			$q = "SELECT albums.*,pictures.*,album_id,picture_id FROM pictures,users,albums,album_pictures WHERE albums.id=album_pictures.album_id AND album_pictures.picture_id=pictures.id AND user_id=$id AND upload_time>'$timestamp' AND users.id=$id ORDER BY pictures.upload_time DESC LIMIT $skip, $limit";
		} else {
			$q = "SELECT pictures.*,albums.*,album_id,picture_id  FROM pictures,users,albums,album_pictures WHERE albums.id=album_pictures.album_id AND album_pictures.picture_id=pictures.id AND user_id=$id AND upload_time>'$timestamp' AND users.id=$id ORDER BY pictures.upload_time DESC";
		}
		if ($rand)
			$q = "SELECT pictures.*,albums.*,album_id,picture_id  FROM pictures,users,albums,album_pictures WHERE albums.id=album_pictures.album_id AND album_pictures.picture_id=pictures.id AND user_id=$id AND users.id=$id ORDER BY RAND() LIMIT 0,$limit";
		return $this -> db -> query($q) -> result();

	}

	function getFollowing($id) {
		$q = "SELECT following FROM follow WHERE follow.follower=$id";
		return $this -> db -> query($q) -> result();
	}

	function getFollowers($id) {
		$q = "SELECT follower FROM follow WHERE follow.following=$id";
		return $this -> db -> query($q) -> result();
	}

	function getFriends($id) {
		$q = "SELECT * FROM friends WHERE (friend2=$id OR friend1=$id) AND confirmed=1";
		return $this -> db -> query($q) -> result();
	}

	function isFollowing($idfollwer, $id) {
		$q = "SELECT * FROM follow WHERE follower=$idfollwer AND following=$id";
		if ($this -> db -> query($q) -> num_rows() >= 1)
			return TRUE;
		else
			return FALSE;
	}

	function getPicturesForCategory($categoryName, $limit, $skip) {
		$q = "SELECT pictures.Title,pictures.id,pictures.title,users.username,pictures.location from pictures,category,users WHERE category.name='$categoryName' AND pictures.category=category.id AND pictures.user_id=users.id ORDER BY pictures.upload_time DESC LIMIT $skip, $limit";
		return $this -> db -> query($q) -> result();
	}

	function getUserSpecialID($userid) {
		$users = str_pad($userid, 6, "0", STR_PAD_LEFT);
		$no1 = substr($users, 0, 3);
		$no2 = substr($users, -3, 3);
		return $no1 . "IPE" . $no2;
	}

	function getCategories() {
		return $this -> db -> query("SELECT * FROM category") -> result();
	}

	function getAlbumsfromUserID($id) {
		return $this -> db -> query("SELECT * 
                                 FROM albums
                                 WHERE albums.uid=$id ORDER BY time DESC") -> result();
	}

	function getAlbumsIDfromPicID($pid) {
		return $this -> db -> query("SELECT album_id 
                                 FROM album_pictures
                                 WHERE picture_id=$pid") -> first_row();
	}

	function getAlbumHeadPicture($albumID) {
		return $this -> db -> query("SELECT location
                                 FROM album_pictures,pictures
                                 WHERE pictures.id=album_pictures.picture_id 
                                 AND album_pictures.album_id=$albumID ORDER BY upload_time DESC") -> first_row();
	}

	function getAlbums($id) {
		return $this -> db -> query("SELECT * FROM albums WHERE uid=$id Order by time DESC") -> result();
	}

	function getCategoryId($category) {
		return $this -> db -> query("SELECT id FROM category WHERE name='$category'") -> first_row();
	}

	function getCategoryName($categoryID) {
		return $this -> db -> query("SELECT name FROM category WHERE id='$categoryID'") -> first_row() -> name;
	}

	function getCategoryNameByPic($pic) {
		return $this -> db -> query("SELECT name FROM pictures,category WHERE pictures.id='$pic' AND pictures.category=category.id") -> first_row() -> name;
	}

	function getPicture($id) {
		return $this -> db -> query("SELECT * FROM pictures WHERE id='$id'") -> first_row();
	}

	function getAllPhotoData($id, $currentUserID = NULL) {
		$data['photoData'] = $this -> getPicture($id);
		$data['userData'] = $this -> getUserData($data['photoData'] -> user_id);
		$data['categoryData'] = $this -> getCategoryNameByPic($id);
		$data['albumData'] = $this -> db -> query("SELECT * FROM album_pictures,albums WHERE picture_id='$id' AND albums.id=album_pictures.album_id") -> first_row();
		$res = $this -> db -> query("SELECT * FROM stars WHERE pid='$id'");
		$data['starData']['count'] = $res -> num_rows();
		$data['starData']['starred'] = FALSE;
		$data['tagsData'] = $this -> db -> query("SELECT * FROM tags t,tags_pictures tp WHERE tp.pid=$id AND tp.tid=t.id") -> result();
		if ($currentUserID != NULL) {
			foreach ($res->result() as $val) {
				if ($val -> uid == $currentUserID)
					$data['starData']['starred'] = TRUE;
			}
		}
		return $data;

	}

	function addStar($uid, $picture, $no) {
		$data1 = array('uid' => $uid, 'pid' => $picture, 'stars' => $no);

		if ($this -> db -> insert("stars", $data1))
			return true;
		else
			return false;
	}

	function getStar($picture, $uid = -1) {
		/*
		$res = NULL;
		if ($uid != -1) {
			$res = $this -> db -> query("SELECT stars FROM stars WHERE pid='$picture' AND uid=$uid") -> first_row();
			if ($res != NULL)
				$res = $res -> stars;
			else
				$res = NULL;

		}
		if ($res == NULL) {
			$s = $this -> db -> query("SELECT stars FROM stars WHERE pid='$picture'");
			$res = 0;
			foreach ($s->result() as $v)
				$res += $v -> stars;
			if ($s -> num_rows() != 0)
				$res /= ($s -> num_rows());

			$res = round($res);

		}
		return $res;
		*/
		$stars = $this -> db -> query("SELECT AVG(stars) as avg FROM stars WHERE pid='$picture'") -> first_row() -> avg;
		$stars = round($stars);
		//die($stars);
		return $stars;
	}

	function getAlbumPictures($pid) {
		$res = $this -> db -> query("SELECT * FROM album_pictures WHERE album_id='$pid'");
		$a['count'] = $res -> num_rows();
		$a['stars'] = 0;
		foreach ($res->result() as $v) {
			$a['stars'] += $this -> getStar($v -> picture_id);
		}
		return $a;
	}

	function addView($id) {
		$this -> db -> query("Update pictures Set views = views + 1 WHERE id=$id");
	}

	function removeStar($uid, $picture) {
		if ($this -> db -> query("DELETE FROM stars WHERE uid=$uid AND pid=$picture"))
			return true;

		return false;
	}

	function deletePicture($id) {
		$album_id = $this -> db -> query("SELECT album_id FROM album_pictures WHERE picture_id=$id") -> first_row() -> album_id;
		$this -> db -> query("DELETE FROM album_pictures WHERE picture_id=$id");

		if ($this -> db -> query("SELECT * FROM album_pictures WHERE album_id=$album_id") -> num_rows() <= 1) {
			$this -> db -> query("DELETE FROM albums WHERE id=$album_id");
		};
		$this -> db -> query("DELETE FROM stars WHERE pid=$id");
		$this -> db -> query("DELETE FROM tags_pictures WHERE pid=$id");
		$this -> db -> query("DELETE FROM addtocompetition WHERE picture_id=$id");
		$this -> db -> query("DELETE FROM comments WHERE pid=$id");
		$array = $this -> db -> query("SELECT * FROM comments WHERE pid=$id") -> result();
		foreach ($array as $value) {
			$this -> db -> query("DELETE FROM notifications WHERE type=2 AND type_id=$value->id");
		}

		$this -> db -> query("DELETE FROM pictures WHERE id=$id");
	}

	function deleteAlbum($id) {
		$res = $this -> db -> query("select * from album_pictures WHERE album_id=$id") -> result();
		foreach ($res as $value) {
			$this -> deletePicture($value -> picture_id);
		}
		$this -> db -> query("DELETE FROM albums WHERE id=$id");
	}

	function changecover($uid, $pid) {
		$this -> db -> query("UPDATE users SET cover_pic='$pid' WHERE id=$uid");
	}

	function getUserData($id) {
		$data['userData'] = $this -> db -> query("SELECT * FROM users WHERE id=$id") -> first_row();
		$data['noOfFollowers'] = $this -> getNoOfFollowers($id);
		$data['noOfFollowing'] = $this -> getNoOfFollowing($id);
		$data['noOfPictures'] = $this -> getNoOfPictures($id);
		$data['noOfAlbums'] = $this -> getNoOfAlbums($id);
		$data['noOfFriends'] = $this -> getNoOfFriends($id);
		$data['noOfPosts'] = $this -> getNoOfPosts($id);

		return $data;
	}

	function getNoOfPosts($id) {
		return $this -> db -> query("Select * From forums where uid=$id") -> num_rows();
	}

	function analysis($id, $datas) {
		$val = $this -> getPicturesForUser($id, 0, -1);
		$totalStars = 0;
		$maxStars = 0;
		$maxStarID = -1;
		$albumarray = array();
		$albumstars = array();
		$countComments = 0;
		$maxComments = 0;
		$maxCommentID = -1;
		foreach ($val as $data) {
			$currComment = $this -> db -> query("SELECT * FROM comments WHERE pid=$data->picture_id") -> num_rows();
			$countComments += $currComment;
			if ($countComments >= $maxComments) {
				$maxCommentID = $data -> picture_id;
				$maxComments = $currComment;
			}
			$max = $this -> getStar($data -> picture_id);
			if (!in_array($data -> album_id, $albumarray)) {
				$albumarray[] = $data -> album_id;
				$albumstars[] = 0;
			}
			for ($i = 0; $i < count($albumarray); $i++) {
				if ($albumarray[$i] == $data -> album_id) {
					$albumstars[$i] += $max;
				}
			}
			if ($max >= $maxStars) {
				$maxStarID = $data -> picture_id;
				$maxStars = $max;
			}
			$totalStars += $max;
		}
		$datas['totalStars'] = $totalStars;
		if ($maxStarID != -1)
			$datas['maxStarID'] = $this -> getPicture($maxStarID) -> location;
		else
			$datas['maxStarID'] = NULL;
		if ($maxCommentID != -1)
			$datas['maxCommentsID'] = $this -> getPicture($maxCommentID) -> location;
		else
			$datas['maxCommentsID'] = NULL;
		if (count($albumarray) != 0) {
			$maxs = array_keys($albumstars, max($albumstars));
			$datas['maxAlbumId'] = $this -> getAlbumName($albumarray[$maxs[0]]) -> name;
		} else {
			$datas['maxAlbumId'] = NULL;
		}
		$datas['commentsReceived'] = $countComments;
		$datas['commentsMade'] = $this -> db -> query("SELECT * FROM comments WHERE uid=$id") -> num_rows();
		$datas['creditsreceived'] = $this -> db -> query("SELECT * FROM testimonial WHERE uid2=$id") -> num_rows();
		$datas['creditsgiven'] = $this -> db -> query("SELECT * FROM testimonial WHERE uid=$id") -> num_rows();
		return $datas;
	}

	function getUser($id) {
		return $this -> db -> query("SELECT * FROM users WHERE id=$id") -> first_row();
	}

	function getNoOfFollowers($id) {
		return $this -> db -> query("SELECT * FROM follow WHERE following=$id") -> num_rows();
	}

	function getNoOfFollowing($id) {
		return $this -> db -> query("SELECT * FROM follow WHERE follower=$id") -> num_rows();
	}

	function getNoOfFriends($id) {
		$q = "SELECT * FROM friends WHERE (friend2=$id OR friend1=$id) AND confirmed=1";
		return $this -> db -> query($q) -> num_rows();
	}

	function getNoOfPictures($id) {
		return $this -> db -> query("SELECT * FROM pictures WHERE user_id=$id") -> num_rows();
	}

	function getNoOfAlbums($id) {
		return $this -> db -> query("SELECT * FROM albums WHERE uid=$id") -> num_rows();
	}

	function getAllAlbumData($id) {
		$res = $this -> db -> query("SELECT * FROM albums WHERE uid=$id ORDER BY time DESC");
		$c = 0;
		if ($res -> num_rows() == 0)
			return array();

		$res = $res -> result();
		foreach ($res as $val) {
			$res[$c] -> photo = $this -> db -> query("SELECT location from pictures WHERE id=$val->cover_pic_id") -> first_row();
			$c++;
		}
		return $res;
		//d
	}

	function getAlbumData($album_id) {
		return $this -> db -> query("SELECT pictures.*,users.username from album_pictures,pictures,users WHERE album_id=$album_id AND picture_id=pictures.id AND users.id=pictures.user_id") -> result();
	}

	function getAlbumName($id) {
		return $this -> db -> query("SELECT * FROM albums WHERE id=$id") -> first_row();
	}

	function changeAlbumCoverPic($aid, $pid) {
		$this -> db -> query("UPDATE albums set cover_pic_id=$pid WHERE id=$aid");
	}

	function getForumPostInCategory($categoryID, $limit = 10, $skip = 0) {
		return $this -> db -> query("SELECT * FROM forums WHERE category_id=$categoryID ORDER BY timestamp DESC LIMIT $skip, $limit") -> result();
	}

	function getForumPosts($limit = 10, $skip = 0) {
		return $this -> db -> query("SELECT * FROM forums WHERE replyid is NULL ORDER BY timestamp DESC LIMIT $skip, $limit") -> result();
	}

	function getComments($pid) {
		$res = $this -> db -> query("SELECT * FROM comments WHERE pid=$pid ORDER BY timestamp DESC") -> result();
		for ($i = 0; $i < count($res); $i++) {
			$uid = $res[$i] -> uid;
			$res[$i] -> userdata = $this -> db -> query("SELECT * FROM users WHERE id=$uid") -> first_row();
		}
		return $res;
	}

	function getForumPost($id) {
		return $this -> db -> query("SELECT * FROM forums WHERE id=$id") -> first_row();
	}

	function getForumsThread($id) {
		return $this -> db -> query("SELECT * FROM forums where id=$id OR replyid=$id") -> result();
	}

	function getNoOfPostsForForum($id) {
		return ($this -> db -> query("SELECT * FROM forums where replyid=$id") -> num_rows() + 1);
	}

	function getLastForumTimestamp($id) {
		$array = ($this -> db -> query("SELECT timestamp,username FROM forums,users where replyid=$id AND forums.uid=users.id ORDER BY timestamp DESC") -> first_row());
		if (empty($array)) {
			$array = ($this -> db -> query("SELECT timestamp,username FROM forums,users where forums.id=$id AND forums.uid=users.id ORDER BY timestamp DESC") -> first_row());
		}
		return $array;
	}

	function getBuySellThread($threadID) {
		$data['postdata'] = $this -> db -> query("SELECT * FROM buysell WHERE id=$threadID") -> first_row();
		$uid = $data['postdata'] -> uid;
		$data['thread'] = $this -> db -> query("SELECT * FROM buysellthread,users WHERE itemid=$threadID AND users.id=buysellthread.uid") -> result();
		$data['userdata'] = $this -> db -> query("SELECT * FROM users WHERE id=$uid") -> first_row();
		return $data;
	}

	function viewAds($skip = 0, $limit = 10) {
		$data = $this -> db -> query("SELECT buysell.*,users.username,users.profileImage FROM buysell,users 
                                 WHERE buysell.uid=users.id
                                 ORDER BY timestamp DESC 
                                 LIMIT $skip, $limit") -> result();
		return $data;
	}

	function getMessageThread($uid1, $uid2, $limit = 10) {
		$res = $this -> db -> query("SELECT * FROM messaging,users WHERE users.id=messaging.uid1 AND uid1=$uid1 AND uid2=$uid2 ORDER BY timestamp LIMIT $limit") -> result();
		$res2 = $this -> db -> query("SELECT * FROM messaging,users WHERE users.id=messaging.uid1 AND uid1=$uid2 AND uid2=$uid1 ORDER BY timestamp LIMIT $limit") -> result();
		$count1 = 0;
		$count2 = 0;
		$res3 = array();
		while ($count1 < count($res) && $count2 < count($res2)) {
			if ($res[$count1] -> timestamp < $res2[$count2] -> timestamp) {
				$res3[] = $res[$count1];
				$count1++;

			} else {
				$res3[] = $res2[$count2];
				$count2++;
			}
		}
		while ($count1 < count($res)) {
			$res3[] = $res[$count1];
			$count1++;
		}
		while ($count2 < count($res2)) {
			$res3[] = $res2[$count2];
			$count2++;
		}
		return $res3;
	}

	function addNotification($type, $type_id, $uid) {
		$data1 = array('type' => $type, 'type_id' => $type_id, 'uid' => $uid, );
		$this -> db -> insert('notifications', $data1);
	}

	function addFeed($type, $type_id, $uid) {
		$data1 = array('type' => $type, 'type_id' => $type_id, 'uid' => $uid, );
		$this -> db -> insert('feed', $data1);
	}

	function addContest($message, $name, $startdate, $enddate) {
		$data1 = array('name' => $name, 'description' => $message, 'startdate' => $startdate, 'enddate' => $enddate, );
		$this -> db -> insert('competition', $data1);
		return $this -> db -> query("SELECT * FROM competition WHERE name='$name'") -> first_row() -> id;
	}

	function addPictureToContest($picture_id, $contest_id) {
		$data1 = array('competition_id' => $contest_id, 'picture_id' => $picture_id, );
		$this -> db -> insert('addtocompetition', $data1);
	}

	function getContestPictures($id) {
		return $this -> db -> query("SELECT a.id,p.* FROM addtocompetition a, pictures p WHERE a.competition_id=$id AND p.id=a.picture_id") -> result();
	}

	function getContestWinner($id) {
		return $this -> db -> query("SELECT addtocompetition.* FROM competition,addtocompetition WHERE competition.id=$id AND winner_id=addtocompetition.id ") -> first_row();
	}

	function setContestWinner($id, $cid) {
		$this -> db -> query("UPDATE competition SET winner_id=(SELECT id FROM addtocompetition WHERE picture_id=$id AND competition_id=$cid LIMIT 1) WHERE id=$cid");
	}

	function getIfUserInContest($cid, $uid) {
		return $this -> db -> query("SELECT * FROM addtocompetition c,pictures p WHERE c.competition_id=$cid AND c.picture_id=p.id AND p.user_id=$uid") -> first_row();
	}

	function getContests($all = FALSE) {
		if ($all)
			return $this -> db -> query("SELECT * FROM competition ORDER BY startdate DESC") -> result();
		else
			return $this -> db -> query("SELECT * FROM competition WHERE winner_id=0 ORDER BY startdate DESC") -> result();
	}

	function getContestDetails($id) {
		return $this -> db -> query("SELECT * FROM competition WHERE id=$id") -> first_row();
	}

	function getNoOfNotifications($user_id) {
		return $this -> db -> query("SELECT * FROM notifications WHERE uid=$user_id AND seen=0") -> num_rows();
	}

	function getFriendRequests($id) {
		return $this -> db -> query("SELECT * FROM friends,users WHERE friend2=$id AND confirmed=0 AND friend1=users.id") -> result();
	}

	function getTestimonial($id, $confirmedReqd = 0) {
		if ($confirmedReqd == 0)
			return $this -> db -> query("SELECT * FROM testimonial,users WHERE uid=$id AND users.id=testimonial.uid2") -> result();
		else
			return $this -> db -> query("SELECT * FROM testimonial,users WHERE uid=$id AND confirm=1 AND users.id=testimonial.uid2") -> result();
	}

	function getNewsItem($id) {
		return $this -> db -> query("SELECT * FROM news WHERE id=$id") -> first_row();
	}

	function getFeed($uid, $type_id) {
		if ($type_id == NULL) {
			$res = $this -> db -> query("SELECT * FROM feed WHERE uid=$uid ORDER BY timestamp DESC");
			if ($res -> num_rows() == 0)
				return array();
			$res = $res -> result();
			$data = array();
			$count = 0;
			foreach ($res as $val) {
				$type = $val -> type;
				$data[$count]['userdata'] = $this -> getUserData($val -> uid);
				switch ($type) {
					case 0 :
						break;
					case 1 :
						$data[$count]['stringit'] = $data[$count]['userdata']['userData'] -> username . " has added a new forum post.";
						$data[$count]['link'] = base_url() . "index.php/view/photo/$val->type_id";
						$data[$count]['image'] = base_url() . "uploads/images" . $data[$count]['userdata']['userData'] -> profileImage;
						break;
					case 2 :
						$data[$count]['stringit'] = $data[$count]['userdata']['userData'] -> username . " has added a new picture.";
						$data[$count]['link'] = base_url() . "index.php/view/photo/$val->type_id";
						$data[$count]['image'] = base_url() . "uploads/images" . $data[$count]['userdata']['userData'] -> profileImage;
						break;
					case 3 :
						$data[$count]['stringit'] = $data[$count]['userdata']['userData'] -> username . " has posted a new ad.";
						$data[$count]['link'] = base_url() . "index.php/buysell/viewAd/$val->type_id";
						$data[$count]['image'] = base_url() . "uploads/userProfile" . $data[$count]['userdata']['userData'] -> profileImage;
						break;
				}
				$count++;
			}
			return $data;
		}
	}

	function getNotifications($user_id, $type_id = NULL) {
		if ($type_id == NULL) {
			$res = $this -> db -> query("SELECT * FROM notifications WHERE uid=$user_id ORDER BY timestamp DESC LIMIT 100") -> result();
		} else {
			$res = $this -> db -> query("SELECT * FROM notifications WHERE uid=$user_id AND type=$type_id ORDER BY timestamp DESC LIMIT 100") -> result();
		}
		$data = array();
		$count = 0;
		foreach ($res as $val) {
			$this -> db -> query("UPDATE notifications SET seen=1 WHERE id=$val->id");
			$type = $val -> type;
			$timestamp = $val -> timestamp;
			$data[$count]['timestamp'] = $timestamp;
			switch ($type) {
				case 0 :
					//addFollower
					$typeId = $val -> type_id;
					if(!$this -> db -> query("SELECT users.id FROM users,follow WHERE follow.id=$typeId  AND users.id=follow.following") -> first_row()) break;
					$data[$count]['userdata'] = $this -> getUserData($this -> db -> query("SELECT users.id FROM users,follow WHERE follow.id=$typeId  AND users.id=follow.following") -> first_row() -> id);
					if(!$data[$count]['userdata'])
						break;
					$data[$count]['stringit'] = $data[$count]['userdata']['userData'] -> username . " has started to follow you.";
					$data[$count]['link'] = base_url() . "index.php/profile/view/" . $data[$count]['userdata']['userData'] -> id;
					$count++;
					break;
				case 1 :
					//forum
					$typeId = $val -> type_id;
					if(!$this -> db -> query("SELECT users.id FROM users,forums WHERE forums.id=$typeId  AND users.id=forums.uid") -> first_row()) break;
					$data[$count]['userdata'] = $this -> getUserData($this -> db -> query("SELECT users.id FROM users,forums WHERE forums.id=$typeId  AND users.id=forums.uid") -> first_row() -> id);
					if(!$data[$count]['userdata'])
						break;
					$data[$count]['stringit'] = $data[$count]['userdata']['userData'] -> username . " has posted in a post you were involved in.";
					$data[$count]['link'] = base_url() . "index.php/forum/viewPost/" . $typeId;
					$count++;
					break;
				case 2 :
					//comment
					$typeId = $val -> type_id;
					if(!$this -> db -> query("SELECT * FROM users,comments WHERE comments.id=$typeId AND users.id=comments.uid") -> first_row()) break;
					$data[$count]['userdata'] = $this -> db -> query("SELECT * FROM users,comments WHERE comments.id=$typeId AND users.id=comments.uid") -> first_row();
					if(!$data[$count]['userdata'])
						break;
					$picID = $data[$count]['userdata'] -> pid;
					$data[$count]['userdata'] = $this -> getUserData($data[$count]['userdata']);
					$data[$count]['stringit'] = $data[$count]['userdata']['userData'] -> username . " has commented on a picture you posted.";
					$data[$count]['link'] = base_url() . "index.php/messaging/getThread/" . $picID;
					$count++;
					break;
				case 3 :
					//message
					$typeId = $val -> type_id;
					if(!$this -> db -> query("SELECT users.id FROM users,messaging WHERE messaging.id=$typeId AND users.id=messaging.uid1") -> first_row()) break;
					$data[$count]['userdata'] = $this -> getUserData($this -> db -> query("SELECT users.id FROM users,messaging WHERE messaging.id=$typeId AND users.id=messaging.uid1") -> first_row() -> id);
					if(!$data[$count]['userdata'])
						break;
					$data[$count]['stringit'] = $data[$count]['userdata']['userData'] -> username . " has messaged you.";
					$data[$count]['link'] = base_url() . "index.php/messaging/getThread/" . $data[$count]['userdata']['userData'] -> id;
					$data[$count]['messagedata'] = ($this -> db -> query("SELECT * FROM messaging WHERE messaging.id=$typeId") -> first_row());

					$count++;
					break;
				default :
					break;
			}
		}
		return $data;

	}
	
	function addNews($title, $message, $dfile_name, $type) {
		$data1 = array('title' => $title, 'message' => $message, 'pic_loc' => $dfile_name, 'type' => $type);

		$this -> db -> insert("news", $data1);		
	}
	
	function deleteNews($id) {
		$this->db->where('id', $id);
		$this->db->delete('news');	
	}
	
	function updatePass($email,$pass){
		$this -> db -> query("UPDATE users SET password='$pass' WHERE email LIKE '$email'");	
	}
	
	function changePass($id,$pass){
		$this -> db -> query("UPDATE users SET password='$pass' WHERE id='$id'");	
	}

	function replace_links( $text )
    	{	
	    $text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
	     
	    $ret = ' ' . $text;
	     
	    // Replace Links with http://
	    $ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\" rel=\"nofollow\">\\2</a>", $ret);
	     
	    // Replace Links without http://
	    $ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\" rel=\"nofollow\">\\2</a>", $ret);
	     
	    // Replace Email Addresses
	    $ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
	    $ret = substr($ret, 1);
	     
	    return $ret;
    	}
}
?>
