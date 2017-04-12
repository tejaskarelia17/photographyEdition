<?php

class Dashboard_model extends CI_Model {
	function __construct() {
		$this -> load -> database();
	}

	function mostStaredPicture() {
		return $this -> db -> query("SELECT *, COUNT(*) AS countx
									FROM pictures, stars
									WHERE pictures.id = pid AND user_id = '" . $this -> session -> userdata('id') . "'
									GROUP BY pid
									ORDER BY COUNT(*) DESC") -> first_row();
	}

	function mostStaredAlbum() {
		return $this -> db -> query("SELECT *, COUNT(*) AS countx
									FROM albums, pictures, album_pictures, stars
	 								WHERE albums.id=album_id AND pictures.id=picture_id AND pictures.id = stars.pid
									AND user_id = '" . $this -> session -> userdata('id') . "'
	 								GROUP BY album_id
	 								ORDER BY COUNT(*) DESC") -> first_row();
	}

	function getAlbumCover($id) {
		return $this -> db -> query("SELECT location FROM pictures WHERE id='" . $id . "'") -> first_row() -> location;
	}

	function mostCommentedPicture() {
		return $this -> db -> query("SELECT *, COUNT(*) AS countx
									FROM pictures, comments
	 								WHERE pictures.id = pid AND user_id = '" . $this -> session -> userdata('id') . "'
	 								GROUP BY pid
	 								ORDER BY COUNT(*) DESC") -> first_row();
	}

	function friends() {
		return $this -> db -> query("SELECT COUNT(*) AS countfriends
	 								FROM friends
	 								WHERE confirmed = '1'
	 								AND (friend1 = '" . $this -> session -> userdata('id') . "' OR friend2 = '" . $this -> session -> userdata('id') . "')") -> first_row() -> countfriends;
	}

	function followers() {
		return $this -> db -> query("SELECT COUNT(*) AS countfollowers
									FROM follow
	 								WHERE following = '" . $this -> session -> userdata('id') . "'") -> first_row() -> countfollowers;
	}

	function following() {
		return $this -> db -> query("SELECT COUNT(*) AS countfollowing
									FROM follow
	 								WHERE follower = '" . $this -> session -> userdata('id') . "'") -> first_row() -> countfollowing;
	}

	function credits() {
		return $this -> db -> query("SELECT COUNT(*) AS countcredits
									FROM testimonial
	 								WHERE confirm = '1'
	 								AND uid = '" . $this -> session -> userdata('id') . "'") -> first_row() -> countcredits;
	}

	function getfriends($letter) {
		return $this -> db -> query("SELECT * FROM (
									SELECT users.id AS id, username, profileImage, city
									FROM users, friends
									WHERE confirmed = '1' AND users.id=friend1 AND friend2='" . $this -> session -> userdata('id') . "'
									UNION DISTINCT
									SELECT users.id AS id, username, profileImage, city
									FROM users, friends
									WHERE confirmed = '1' AND users.id=friend2 AND friend1='" . $this -> session -> userdata('id') . "'
									) AS users_friends
									WHERE UPPER(username) LIKE '".$letter."%'
									ORDER BY username") -> result();
	}

	function getFollowing($letter) {
		return $this -> db -> query("SELECT users.id AS id, username, profileImage, city
									FROM users, follow
	 								WHERE users.id = following
	 								AND follower = '" . $this -> session -> userdata('id') . "'
									AND UPPER(username) LIKE '".$letter."%'
									ORDER BY username") -> result();
	}

	function getFollowers($letter) {		
		return $this -> db -> query("SELECT users.id AS id, username, profileImage, city
									FROM users, follow
	 								WHERE users.id = follower
	 								AND following = '" . $this -> session -> userdata('id') . "'
									AND UPPER(username) LIKE '".$letter."%'
									ORDER BY username") -> result();
	}

	function getCredits() {
		return $this -> db -> query("SELECT *
									FROM testimonial
	 								WHERE confirm = '1'
	 								AND uid = '" . $this -> session -> userdata('id') . "'") -> result();
	}

	function getNews($type) {
		return $this -> db -> query("SELECT *
									FROM news
	 								WHERE type = '".$type."' ORDER BY id DESC") -> result();
	}

	function getMessages() {
		return $this -> db -> query("SELECT * FROM (
									(SELECT users.id AS id, username, profileImage, message, timestamp
									FROM users, messaging
									WHERE users.id=uid1 AND uid2='" . $this -> session -> userdata('id') . "'
									ORDER BY timestamp DESC
									)
									UNION
									(SELECT users.id AS id, username, profileImage, message, timestamp
									FROM users, messaging
									WHERE users.id=uid2 AND uid1='" . $this -> session -> userdata('id') . "'
									ORDER BY timestamp DESC
									)
									) AS users_messaging
									GROUP BY id
									ORDER BY timestamp DESC") -> result();
	}
	
	function requestFriend() {
		return $this -> db -> query("SELECT users.id AS uid, username, profileImage, friends.id AS id, friend1
									FROM users, friends
									WHERE confirmed = '0' AND users.id=friend1
									AND friend2='" . $this -> session -> userdata('id') . "'
									") -> result();
	}
	
	function requestCredit() {
		return $this -> db -> query("SELECT uid, username, profileImage, testimonial, testimonial.id as id, uid2
									FROM users, testimonial
	 								WHERE users.id = uid2 AND confirm = '0'
	 								AND uid = '" . $this -> session -> userdata('id') . "'") -> result();
	}

	public function accept_friend($id) {
		$this -> db -> query("UPDATE friends SET confirmed = '1' WHERE id = '".$id."'");
	}

	public function deny_friend($id) {
		$this -> db -> query("DELETE FROM friends WHERE id = '".$id."'");
	}

	public function accept_credit($id) {
		$this -> db -> query("UPDATE testimonial SET confirm = '1' WHERE id = '".$id."'");
	}

	public function deny_credit($id) {
		$this -> db -> query("DELETE FROM testimonial WHERE id = '".$id."'");
	}
	
	public function getUsername($id){
		return $this -> db -> query("SELECT username FROM users
									WHERE id = '".$id."'") -> first_row()->username;
	}
	
	public function getNotification(){
		$res = $this -> db -> query("SELECT * FROM notifications WHERE uid='" . $this -> session -> userdata('id') . "' ORDER BY timestamp DESC") -> result();
		
	}

}
