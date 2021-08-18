import { Directive, ElementRef, Renderer2, HostListener, HostBinding} from '@angular/core';

@Directive({
  selector: '[appBetterSurlign]'
})
export class BetterSurlignDirective {
  
  constructor(private el:ElementRef, private renderer: Renderer2) {
    renderer.setStyle(el.nativeElement, 'backgroundColor', 'transparent');
  }
  @HostBinding('style.backgroundColor') backgroundColor: string;
  @HostListener('mouseenter') onMouseEnter() { 
    this.renderer.setStyle(this.el.nativeElement, 'backgroundColor', '#03ecfc');
  } 

  @HostListener('mouseleave') onMouseLeave() { 
    this.renderer.setStyle(this.el.nativeElement, 'backgroundColor', 'transparent');
  }
  @HostListener('mouseover') onMouseOver() {
    this.backgroundColor = '#03ecfc';
}
}
