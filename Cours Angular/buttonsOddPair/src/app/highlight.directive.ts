import { Directive, ElementRef} from '@angular/core';

@Directive({
  selector: '[appBasicSurlign]'
})
export class BasicSurlignDirective {

  constructor(el: ElementRef) {
    el.nativeElement.style.backgroundColor = 'green';
  }

}
