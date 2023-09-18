import classNames from 'classnames';
import styles from './index.module.scss';

export default function Footer() {
  return (
    <footer
      className={classNames(styles.footer, 'my-16 text-center text-[#b3b3b3] ')}
    >
      <section className="flex flex-col items-center">Orz CSS</section>
    </footer>
  );
}
