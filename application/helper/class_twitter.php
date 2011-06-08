<?php

	/* This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.

     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.

     * You should have received a copy of the GNU General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/>.
     *
     * File:    Twitter.class.php
	 * Author:  Brandon Trebitowski
	 * Created: 02/26/2009
	 * Updated  06/24/09
	 * Version: 1.1
	 *
     */

	class Twitter {
		
		
		var $username='';  
		var $password=''; 
		var $responseInfo=array(); 
		
		// Status Methods
		/*
		 * Returns the 20 most recent statuses from non-protected users 
		 * who have set a custom user icon.  Does not require authentication.  
		 * Note that the public timeline is cached for 60 seconds so requesting 
		 * it more often than that is a waste of resources.
		 */
		function public_timeline($format) {
			$request = 'http://twitter.com/statuses/public_timeline.'.$format;
			return $this->process($request);
		 }
		 
		 /* Returns the 20 most recent statuses posted by the authenticating 
		  * user and that user's friends. This is the equivalent of /home on the Web. 
		  */
		function friends_timeline($format='xml',$count=20) {
			$request = 'http://twitter.com/statuses/friends_timeline.'.$format;
			$postargs = "count=$count";
			return $this->process($request,$postargs); 
		}
		
		/* Returns the 20 most recent statuses posted from the authenticating user. 
		 * It's also possible to request another user's timeline via the id parameter 
		 * below. This is the equivalent of the Web /archive page for your own user, 
		 * or the profile page for a third party.
		 */
		function user_timeline($format='xml',$id=null) {
			$request = 'http://twitter.com/statuses/user_timeline.'.$format;
			if($id) {
				$postargs = "id=$id";
				return $this->process($request,$postargs); 
			}
			return $this->process($request);
		}
		
		/* Updates the authenticating user's status.  Requires the status parameter 
		 * specified below.  Request must be a POST.  A status update with text identical 
		 * to the authenticating user's current status will be ignored.
		 */
		function update($format = 'xml',$status){ 
			$request = 'http://twitter.com/statuses/update.'.$format; 
			$postargs = 'status='.urlencode($status); 
			return $this->process($request,$postargs); 
		} 
		
		/* Returns the 20 most recent @replies (status updates prefixed with @username) 
		 * for the authenticating user.
		 */
		function replies($format='xml') {
			$request = 'http://twitter.com/statuses/replies.'.$format;
			return $this->process($request);
		}
		
		// User Methods
		/* Returns the authenticating user's friends, each with current status inline. 
		 * They are ordered by the order in which they were added as friends. It's also 
		 * possible to request another user's recent friends list via the id parameter below. 
		 */
		function friends($format='xml',$id=null,$page=1) {
			$request = 'http://twitter.com/statuses/friends.'.$format;
			$postargs = "page=$page";
			if($id) {
				$postargs .= "&id=$id";
			}
			return $this->process($request,$postargs); 
		}
		
		/* Returns the authenticating user's followers, each with current status inline.  
		 * They are ordered by the order in which they joined Twitter (this is going to be changed). 
		 */
		function followers($format='xml',$id=null,$page=1) {
			$request = 'http://twitter.com/statuses/followers.'.$format;
			$postargs = "page=$page";
			if($id) {
				$postargs .= "&id=$id";
			}
			return $this->process($request,$postargs); 
		}
		
		/* Returns extended information of a given user, specified by ID or screen name 
		 * as per the required id parameter below.  This information includes design settings, 
		 * so third party developers can theme their widgets according to a given user's preferences. 
		 * You must be properly authenticated to request the page of a protected user.
		 */
		function show($format='xml',$id) {
			$postargs = "";
			
			$request = 'http://twitter.com/users/show/'.$id.".$format";
			
			return $this->process($request); 
		}
		
		// Friendship Methods
		
		/* Befriends the user specified in the ID parameter as the authenticating user.  
		 * Returns the befriended user in the requested format when successful.  Returns 
		 * a string describing the failure condition when unsuccessful.
		 */
		function create($format='xml',$user_ID) {
			$request = "http://twitter.com/friendships/create/$user_ID.$format";
			return $this->process($request); 
		}
		
		/* Discontinues friendship with the user specified in the ID parameter as the 
		 * authenticating user.  Returns the un-friended user in the requested format 
		 * when successful.  Returns a string describing the failure condition when unsuccessful. 
		 */ 
		function destroy($format='xml',$user_ID) {
			$request = "http://twitter.com/friendships/destroy/$user_ID.$format";
			return $this->process($request); 
		}
		
		/* Tests if a friendship exists between two users. 
		 */
		function exists($format='xml',$user_ID_a,$user_ID_b) {
			$request = "http://twitter.com/friendships/exists.$format?user_a=$user_ID_a&user_b=$user_ID_b";
			return $this->process($request); 
		}
		
		/* Processes a Twitter Request using cURL */
		function process($url,$postargs=false){ 
 			$curl_conn = curl_init();
 			
		 	if($postargs !== false){ 
            	curl_setopt ($curl_conn, CURLOPT_POST, true); 
            	curl_setopt ($curl_conn, CURLOPT_POSTFIELDS, $postargs); 
        	} 
         
			curl_setopt($curl_conn, CURLOPT_URL, $url); //URL to connect to
			//curl_setopt($curl_conn, CURLOPT_POST, 1); //Use GET method
			curl_setopt($curl_conn, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); //Use basic authentication
			curl_setopt($curl_conn, CURLOPT_USERPWD, $this->username.":".$this->password); //Set u/p
			curl_setopt($curl_conn, CURLOPT_SSL_VERIFYPEER, false); //Do not check SSL certificate (but use SSL of course), live dangerously!
			curl_setopt($curl_conn, CURLOPT_RETURNTRANSFER, 1); //Return the result as string
			
			// Result from querying URL. Will parse as xml
			$output = curl_exec($curl_conn);
			
			// close cURL resource. It's like shutting down the water when you're brushing your teeth.
			
			$this->responseInfo=curl_getinfo($curl_conn); 
			curl_close($curl_conn);
			
			if(intval($this->responseInfo['http_code'])==200){ 
				// Display the response from Twitter
				return $output;
			}else{ 
				// Something went wrong
				return "Error: " . $this->responseInfo['http_code']; 
			}
			
		}
	}
?>