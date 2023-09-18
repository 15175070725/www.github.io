import Link from 'next/link';
import styles from './index.module.scss';
export default function linkGroup() {
  return (
    <nav className="flex items-center mr-10">
      <ul className="flex items-center">
        <li className="mx-4 cursor-pointer">
          <Link
            href={'/show-all'}
            className={styles.nav__link}
          >
            全部
          </Link>
        </li>
      </ul>
    </nav>
  );
}
