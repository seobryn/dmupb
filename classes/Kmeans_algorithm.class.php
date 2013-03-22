<?php
//THIS CLASS IS FOR KMEANS ALGORITHM
class Kmeans {
	
	private $nInstances; 	   //Number of instances to clasify
	private $nCoordinate;	  //Number of coordinates of each point
	private $nCluster;		 //Number of Clusters
	private $nDimPoint;		//Coordinate of means nDimPoint[i] of each cluster
	private $classPoint;   //Holds the points clasified into each classPoint[i]
	private $derivSt;		//Holds the standar derivation of each class i
	private $priority;		//Holds the priority of each class i
	private $logProb;		//Holds the log Likehood of each of the k Gaussians
	private $MDL;			//Minimum Description Length of the model
	
	
	//CONSTRUCTOR
	public function Kmeans(){	
	}
	
	
}