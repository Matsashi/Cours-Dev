import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-exo-recap-button',
  templateUrl: './exo-recap-button.component.html',
  styleUrls: ['./exo-recap-button.component.css']
})
export class ExoRecapButtonComponent implements OnInit {
userName: string="";
accessButton: boolean=false;
changeBoolean(){
  if(this.userName){
    this.accessButton=true;
  }else{
  this.accessButton=false;
  }
}
resetUsername(){
  this.userName="";
  this.changeBoolean();
}
  constructor() { }

  ngOnInit(): void {
  }

}
