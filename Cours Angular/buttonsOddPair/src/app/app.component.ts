import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  tabNumberEven: Array<number>=[2,4];
  tabNumberOdd: Array<number>=[1,3,5];
  buttonText: string="Only show odd numbers";
  evenNumbers: boolean=false;
  oddNumbers: boolean=true;
  changeNumber(){
    if(this.buttonText=="Only show odd numbers"){
      this.evenNumbers=true;
      this.oddNumbers=false;
      this.buttonText="Only show even numbers";
    }else{
      this.evenNumbers=false;
      this.oddNumbers=true;
      this.buttonText="Only show odd numbers";
    }
  }
}
