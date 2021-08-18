import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styles: ['.on {background-color: pink;}']
})
export class AppComponent {
  counter: number=0;
  counterArray: Array<number>= [];
  hide: boolean=true;
  valueButton: string="Afficher les détails"
  showP(){
    this.counter++;
    this.counterArray.push(this.counter);
    if(this.hide){
      this.hide = false;
      this.valueButton = "Cacher les détails";
    }else{
      this.hide = true;
      this.valueButton = "Afficher les détails";
    }
  }
}
